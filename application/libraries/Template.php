<?php
	class Template {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
		}

		function views($template = NULL, $data = NULL) {
			if ($template != NULL) {
				// head
				$data['_meta'] 					= $this->_ci->load->view('_layout/_sipers2/_meta', $data, TRUE);
				$data['_css'] 					= $this->_ci->load->view('_layout/_sipers2/_css', $data, TRUE);
				
				// Header
				$data['_nav'] 					= $this->_ci->load->view('_layout/_sipers2/_nav', $data, TRUE);
				$data['_header'] 				= $this->_ci->load->view('_layout/_sipers2/_header', $data, TRUE);
				
				//Sidebar
				$data['_sidebar'] 				= $this->_ci->load->view('_layout/_sipers2/_sidebar', $data, TRUE);
				
				//Content
				$data['_headerContent'] 		= $this->_ci->load->view('_layout/_sipers2/_headerContent', $data, TRUE);
				$data['_mainContent'] 			= $this->_ci->load->view($template, $data, TRUE);
				$data['_content'] 				= $this->_ci->load->view('_layout/_sipers2/_content', $data, TRUE);
				
				//Footer
				//$data['_footer'] 				= $this->_ci->load->view('_layout/_footer', $data, TRUE);
				
				//JS
				$data['_js'] 					= $this->_ci->load->view('_layout/_sipers2/_js', $data, TRUE);

				echo $data['_template'] 		= $this->_ci->load->view('_layout/_sipers2/_template', $data, TRUE);
			}
		}
	}
?>