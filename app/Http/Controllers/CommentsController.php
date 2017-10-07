<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view( 'comments.create' );
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
            $comment = Comment::create([
                'body'                 => $request->input('body'),
                'url'                  => $request->input('url'),
                'commentable_id'       => $request->input('commentable_id'),
                'commentable_type'     => $request->input('commentable_type'),
                'user_id'              => Auth::user()->id
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
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
