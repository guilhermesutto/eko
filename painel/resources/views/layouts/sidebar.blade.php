<!-- Left Panel -->

<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Eko</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Eko</b>Volunteers</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <i class="fas fa-angle-double-left"></i>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">          
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="logout" ><i class="fas fa-sign-out-alt"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li class="">
          <a href="<?php echo url('/home'); ?>">
            <i class="fas fa-chart-line"></i> <span>Dashboard</span>            
          </a>          
        </li>
        @foreach(App\Areas::where(array('ativo' => 1, 'id_pai' => 0))->orderBy('order_by', 'asc')->get() AS $Area)
            <?php if($Area->id == 11) continue; ?>
            <?php $Area->Subareas = App\Areas::where(array('ativo' => 1, 'id_pai' => $Area->id))->orderBy('order_by', 'asc')->get(); ?>
            <?php $class= ""; if(count($Area->Subareas) > 0) $class="treeview"; ?>
            <li class={{$class}}>
              <a href="{{ url($Area->url) }}">
                  <i class="{{$Area->icon}}"></i>
                  <span>{{ $Area->titulo }}</span> 
                  @if(count($Area->Subareas) > 0)                        
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  @endif               
              </a>
              @if(count($Area->Subareas) > 0)                    
                  <ul class="treeview-menu">
                      @foreach($Area->Subareas AS $SubArea)                          
                          <li><a href="{{ url($SubArea->url) }}"><i class="{{$SubArea->icon}}"></i> {{ $SubArea->titulo }}</a></li>                            
                      @endforeach    
                  </ul>
              @endif
            </li>
            
        @endforeach            
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
    <!-- Left Panel -->