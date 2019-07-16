<?php

class News 
{

	private $id;
	private $auteur;
	private $titre;
	private $contenu;
	private $dateAjout;
	private $dateModif;


	public function getId()
	{
		return $this->id;
	}

	public function getAuteur()
	{
		return $this->auteur;
	}
	
	public function getTitre()
	{
		return $this->titre;
	}
	
	public function getContenu()
	{
		return $this->contenu;
	}

	public function getDateAjout()
	{
		return $this->dateAjout;
	}

	public function getDateModif()
	{
		return $this->dateModif;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	public function setAuteur($auteur)
	{
		$this->auteur = $auteur;
		return $this;
	}
	
	public function setTitre($titre)
	{
		$this->titre = $titre;
		return $this;
	}
	
	public function setContenu($contenu)
	{
		$this->contenu = $contenu;
		return $this;
	}

	public function setDateAjout($dateAjout)
	{
		$this->dateAjout = $dateAjout;
		return $this;
	}

	public function setDateModif($dateModif)
	{
		$this->dateModif = $dateModif;
		return $this;
	}

}