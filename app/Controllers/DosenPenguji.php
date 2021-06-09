<?php

namespace App\Controllers;

class DosenPenguji extends BaseController
{
	public function index()
	{
		return view('dosenpenguji/index');
	}
	public function jadwaluji()
	{
		return view('dosenpenguji/jadwaluji');
	}
	public function detailberita()
	{
		return view('dosenpenguji/detailberita');
	}
}