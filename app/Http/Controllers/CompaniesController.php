<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//Estou importando para fazer autentificação
// use Illuminate\View\Middleware\ShareErrorsFromSession;
class CompaniesController extends Controller
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
            $companies = Company::where( 'user_id' , Auth::user()->id )->get() ;
            return view('companies.index' , ['companies' => $companies]);
        }
        //se não estiver logado é enviado para page login
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //carregar view pela url companies/create que conterá o form de criação
        return view('companies.create');
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
            $company = Company::create([
                'name'          => $request->input('name'),
                'description'   => $request->input('description'),
                'user_id'       => Auth::user()->id
            ]);

            //Se foi criado com sucesso é efetuado o redirect para mostrar a nova company
            if( $company ){
                return  redirect()->route( 'companies.show' , [ 'company' => $company->id ] )
                        ->with( 'success' , 'Company created successfully');
            }
        }
        // $errors = new ShareErrorsFromSession();
        //caso de erro, se retorna e mostra msg error
        return back()->withInput()->with( 'errors' , 'Company could not be created' );        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        // example:.$user = DB::table('users')->where('name', 'John')->first()
        // Não preciso por dessa forma porque estou recebendo por parametro a model, que já está vinculada a tabela
        // há duas formas de fazer essa busca, segue abaixo
        // $company = Company::where( 'id' , $company->id )->first();
        $company = Company::find($company->id);
        return view('companies.show' , [ 'company' => $company ]);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        $company = Company::find($company->id);
        return view('companies.edit' , [ 'company' => $company ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        /**
        * Estou criando uma variável que está recebendo um metodo de update, Através da classe model eu chamo where pela id
        * Assim ele me retorna a tabela desejada, em $request estou recebendo as requisições ou os campos enviados pelo formulário através do method POST 
        * E dessa forma posso pegar os dados pelos nomes dos inputs do formulário e seus valores e atualizar minha tabela
        **/

        //save data
        $companyUpdate = Company::where( 'id' , $company->id )
                                ->update( [
                                    'name' => $request->input('name'),
                                    'description' => $request->input('description')
                                ] );

        /**
        * Caso ocorra com sucesso o update é chamado um redirect para pagina anterior,
        * e exibido mensagem de sucesso
        **/
        if( $companyUpdate ){
            return  redirect()
                    ->route( 'companies.show' , [ 'company' => $company->id ] )
                    ->with( 'success', 'Company Updated Successfully');
        }
        
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        // $findCompany tem o retorno de uma tabela de acordo com o id passada
        // se o metodo delete for chamado e executado sem problemas o user será redirecionado para pagina companies com msg de sucesso
        $findCompany = Company::find( $company->id );
        if( $findCompany->delete() ){

            //redirect success
            return  redirect()->route('companies.index')
                    ->with( 'success' , 'Company deleted successfully' );
        }        

        //redirect error
        return back()->withInput()->with( 'error' , 'Company could not be deleted' );
    }
}
