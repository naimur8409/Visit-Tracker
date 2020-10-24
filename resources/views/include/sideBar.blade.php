<div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">


                    <li class="nav-item" ><a class="nav-item-hold" href="{{route('home')}}"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                    </li>

{{-- ==============================For Admin==================== --}}
                    @if(auth()->user()->hasRole('admin'))

                        <li class="nav-item" data-item="charts">
                            <a class="nav-item-hold" href="#">
                                <i class="nav-icon i-File-Clipboard-File--Text"></i>
                                <span class="nav-text">Users Setting</span>
                            </a>
                            <div class="triangle"></div>
                        </li>


                        {{-- <li class="nav-item" data-item="faculty"><a class="nav-item-hold" href="#"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">Faculty</span></a>
                            <div class="triangle"></div>
                        </li> --}}

                        <li class="nav-item" data-item="student">
                            <a class="nav-item-hold" href="#"><i class="nav-icon i-File-Clipboard-File--Text"></i>
                                <span class="nav-text">Role-permission Setting</span>
                            </a>
                            <div class="triangle"></div>
                        </li>

                    @endif
                        
                        <li class="nav-item" data-item="client_visit">
                            <a class="nav-item-hold" href="#"><i class="nav-icon i-File-Clipboard-File--Text"></i>
                                <span class="nav-text">Client-Visit Setting</span>
                            </a>
                            <div class="triangle"></div>
                        </li>
                     @if(auth()->user()->hasRole('admin'))

                        <li class="nav-item" data-item="reports">
                            <a class="nav-item-hold" href="#"><i class="nav-icon i-File-Clipboard-File--Text"></i>
                                <span class="nav-text">Reports</span>
                            </a>
                            <div class="triangle"></div>
                        </li>

                    @endif
                  
                </ul>
            </div>
            
            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">

                {{-- ==================Users================== --}}
                @if(auth()->user()->hasRole('admin'))
                    <ul class="childNav" data-parent="charts">
                        <li class="nav-item">
                            <a href="{{route('user.all')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i>
                                <span class="item-name">All Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.create')}}">
                                <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                                <span class="item-name">Create A new user</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.deleted')}}">
                                <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                                <span class="item-name">View Deleted User</span>
                            </a>
                        </li>
                    </ul>
                

                {{-- ==================Roles================== --}}
                <ul class="childNav" data-parent="student">
                    <li class="nav-item">
                        <a href="{{route('all_roles')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Role-permission List</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="charts.chartsjs.html"><i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Create role-permission</span>
                        </a>
                    </li> --}}
                </ul>
                @endif
                
                {{-- ==================Client Visit================== --}}
                
                
                <ul class="childNav" data-parent="client_visit">
                    @if(auth()->user()->hasRole('admin'))
                    <li class="nav-item">
                        
                        <a href="{{route('visit.client_list')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Client Visit List</span>
                        </a>
                    </li>
                    @endif 
                    <li class="nav-item">
                        <a href="{{route('create_client_visit')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Add Client Visit Info</span>
                        </a>
                    </li>
  
                    <li class="nav-item">
                        <a href="{{route('visit.mine',Auth::user()->id) }}"><i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">My Visit</span>
                        </a>
                    </li>
                </ul>
                
                

                {{--  ==============================Reports======================  --}}
               
                <ul class="childNav" data-parent="reports">
                    @if(auth()->user()->hasRole('admin'))
                    <li class="nav-item">
                        
                        <a href="{{route('monthy_report')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Monthy Report</span>
                        </a>
                    </li>
                    
                    {{--  <li class="nav-item">
                        <a href="{{route('create_client_visit')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Add Client Visit Info</span>
                        </a>
                    </li>
     
                    <li class="nav-item">
                        <a href="{{route('my_visit',Auth::user()->id) }}"><i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">My Visit</span>
                        </a>
                    </li>  --}}
                    @endif
                    
                </ul>
                


                <!-- Submenu Dashboards-->
                
                <ul class="childNav" data-parent="forms">
                    <li class="nav-item"><a href="form.basic.html"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Basic Elements</span></a></li>
                    <li class="nav-item"><a href="form.layouts.html"><i class="nav-icon i-Split-Vertical"></i><span class="item-name">Form Layouts</span></a></li>
                    <li class="nav-item"><a href="form.input.group.html"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Input Groups</span></a></li>
                    <li class="nav-item"><a href="form.validation.html"><i class="nav-icon i-Close-Window"></i><span class="item-name">Form Validation</span></a></li>
                    <li class="nav-item"><a href="smart.wizard.html"><i class="nav-icon i-Width-Window"></i><span class="item-name">Smart Wizard</span></a></li>
                    <li class="nav-item"><a href="tag.input.html"><i class="nav-icon i-Tag-2"></i><span class="item-name">Tag Input</span></a></li>
                    <li class="nav-item"><a href="editor.html"><i class="nav-icon i-Pen-2"></i><span class="item-name">Rich Editor</span></a></li>
                </ul>


            </div>
            <div class="sidebar-overlay"></div>
</div>