<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
    <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
@can('files')
    <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
@endcan

<li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Tenders</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        @can('tenders')
            <li><a href='{{ backpack_url('tender') }}'><i class='fa fa-tag'></i> <span>Tenders</span></a></li>
        @endcan
        @can('tenders')
            <li><a href='{{ backpack_url('partner') }}'><i class='fa fa-user'></i> <span>Tender Partners</span></a></li>
            @endcan
    </ul>
</li>
@can('users')
    <!-- Users, Roles Permissions -->
    <li class="treeview">
        <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
            <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
            <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
        </ul>
    </li>
@endcan
