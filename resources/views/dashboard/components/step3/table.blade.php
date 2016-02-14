<div class="shortcuts">


    @foreach($assignment->groups as $group)
        <a href="javascript:;" class="shortcut">
            <i class="shortcut-icon icon-list-alt"></i>
            <span class="shortcut-label">{{$group->name}}</span>
            <span class="shortcut-label">{{$group->description}}</span>
        </a>
    @endforeach

</div>
