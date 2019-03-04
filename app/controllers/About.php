<?php


class About extends Controller
{
	public function index($nama='ipul',$pekerjaan='programer')
	{
		$this->view(about/index);
	}
	public function page()
	{
		$this->view(about/page);
	}
}