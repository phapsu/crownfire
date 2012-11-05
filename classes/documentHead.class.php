<?php
class documentHead extends crownfire {

	public function __construct($document_id=null) {
		parent::__construct();
		
		if ($document_id) {
			$this->document_id = $document_id;
			$this->load();
		}
	}
}