<?php
function breadcrumb_panel($title = '', $nav = array()){
    $html = '
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">'.$title.'</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"> <i class="nav-icon fas fa-home"> </i>Inicio</a></li>';

              foreach($nav as $k) {
                if($k["href"] == '#'){
                    $html .= '<li class="breadcrumb-item active"><i class="fas fa-user-plus"></i> '.$k["tarea"].'</li>';
                }
                else{
                    $html .= '<li class="breadcrumb-item active"><i class="fas fa-user"></i> '.$k["tarea"].'</li>';
                }
              }

          $html .= ' </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->';

    return $html;
}//end breadcrumb_panel
?>
