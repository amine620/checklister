<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav">
           @if (auth()->user()->is_admin)
        <li class="c-sidebar-nav-title">{{__('Manage Checklist')}}</li>
        @foreach (\App\Models\CheckListGroup::with('checklists')->get() as $group)
            
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show">
            <a
                class="c-sidebar-nav-link " href="{{route('admin.checklist_groups.edit',$group->id)}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                </svg>{{$group->name}}</a>
                <ul class="c-sidebar-nav-dropdown-items">

                    @foreach ($group->checklists as $checklist)
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{route('admin.checklist_groups.checklists.edit',[$group,$checklist])}}">
                            <span class="c-sidebar-nav-icon"> </span>
                            {{$checklist->name}}
                        </a>      
                    </li>
                    @endforeach
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{route('admin.checklist_groups.checklists.create',$group)}}">{{__('New CheckList')}}</a>
                    </li>

                </ul>
           
        </li>
        @endforeach

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.checklist_groups.create')}}">{{__('New CheckList Group')}}</a>
        </li>
        

        <li class="c-sidebar-nav-title">{{__('Manage Data')}}</li>

        
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                class="c-sidebar-nav-link " href="{{route('admin.users.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                </svg>{{'Users' }}</a>
           
        </li>
       

       @endif

       
  
       
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>