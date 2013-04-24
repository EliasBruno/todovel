<?php

class TaskController extends BaseController {
	public function getAdd() {
		return View::make('add_task');
	}
	
	public function postAdd() {
		//criando regras de valida��o
		$regras = array('titulo' => 'required');
		
		//executando valida��o
		$validacao = Validator::make(Input::all(), $regras);
		
		//se a valida��o deu errado
		if ($validacao->fails()) {
			return Redirect::to('task/add')->withErrors($validacao);
		}
		//se a valida��o deu certo
		else {
			$task = new Task;
			$task->titulo = Input::get('titulo');
			$task->save();
			
			return View::make('add_task')->with('sucesso', TRUE);
		}
	}
	
	public function listar() {
		return View::make('list_tasks')->with('tasks', Task::all());
	}
}