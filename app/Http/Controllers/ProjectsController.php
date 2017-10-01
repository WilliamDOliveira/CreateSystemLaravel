<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //verifica se o usuário está logado
        if( Auth::check() ){
            //se estiver logado irá fazer a listar de acordo com a sua id 
            //ou seja so vai listar o que ele criou
            $projects = Project::where( 'user_id' , Auth::user()->id )->get() ;
            return view('projects.index' , ['projects' => $projects]);
        }
        //se não estiver logado é enviado para page login
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     /*
     estou definindo id com null em rotas defini que é opcional passar a id e deixando ela como null eu posso fazer validações aqui
     */
    public function create( $company_id = null )
    {
        //carregar view pela url projects/create, e passar a variavel id de company
        return view('projects.create' , [ 'company_id' => $company_id ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verifica se está logado | class auth já importada acima
        if( Auth::check() ){
            //Recebe os valores para criação da tabela através do request que contem o valor dos inputs do formulário
            $project = Project::create([
                'name'          => $request->input('name'),
                'description'   => $request->input('description'),
                'days'          => $request->input('days'),
                'company_id'    => $request->input('company_id'),
                'user_id'       => Auth::user()->id
            ]);

            //Se foi criado com sucesso é efetuado o redirect para mostrar a nova project
            if( $project ){
                return  redirect()->route( 'projects.show' , [ 'project' => $project->id ] )
                        ->with( 'success' , 'project created successfully');
            }
        }
        // $errors = new ShareErrorsFromSession();
        //caso de erro, se retorna e mostra msg error
        return back()->withInput()->with( 'errors' , 'project could not be created' );        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // example:.$user = DB::table('users')->where('name', 'John')->first()
        // Não preciso por dessa forma porque estou recebendo por parametro a model, que já está vinculada a tabela
        // há duas formas de fazer essa busca, segue abaixo
        // $project = Project::where( 'id' , $project->id )->first();
        $project = Project::find($project->id);
        return view('projects.show' , [ 'project' => $project ]);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $project = Project::find($project->id);
        return view('projects.edit' , [ 'project' => $project ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        /**
        * Estou criando uma variável que está recebendo um metodo de update, Através da classe model eu chamo where pela id
        * Assim ele me retorna a tabela desejada, em $request estou recebendo as requisições ou os campos enviados pelo formulário através do method POST 
        * E dessa forma posso pegar os dados pelos nomes dos inputs do formulário e seus valores e atualizar minha tabela
        **/

        //save data
        $projectUpdate = Project::where( 'id' , $project->id )
                                ->update( [
                                    'name' => $request->input('name'),
                                    'description' => $request->input('description')
                                ] );

        /**
        * Caso ocorra com sucesso o update é chamado um redirect para pagina anterior,
        * e exibido mensagem de sucesso
        **/
        if( $projectUpdate ){
            return  redirect()
                    ->route( 'projects.show' , [ 'project' => $project->id ] )
                    ->with( 'success', 'project Updated Successfully');
        }
        
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // $findproject tem o retorno de uma tabela de acordo com o id passada
        // se o metodo delete for chamado e executado sem problemas o user será redirecionado para pagina projects com msg de sucesso
        $findproject = Project::find( $project->id );
        if( $findproject->delete() ){

            //redirect success
            return  redirect()->route('projects.index')
                    ->with( 'success' , 'project deleted successfully' );
        }        

        //redirect error
        return back()->withInput()->with( 'error' , 'project could not be deleted' );
    }
}
