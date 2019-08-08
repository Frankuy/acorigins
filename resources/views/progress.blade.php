<h1 class="title is-size-5 has-text-warning">PROGRESS</h1>

<h1 class="has-text-weight-bold has-text-warning progressTitle" onclick="toggleMelee()">Melee Weapons <span id="meleeIcon" class="showMelee"><i class="fas fa-chevron-right"></i></span></h1>
<progress class="progress is-warning is-marginless" value="{{$melee_done}}" max="{{$melee_length}}"></progress>
<h1 class="has-text-warning has-text-right">{{$melee_done}}/{{$melee_length}}</h1>

<div class="meleeStatContainer" style="margin-left: 30px">
    @foreach ($melee as $type)
        <h1 class="has-text-warning is-size-7">{{$type['name']}}</h1>
        <progress class="progress is-warning is-marginless is-small" value="{{$type['done']}}" max="{{$type['length']}}"></progress>
        <h1 class="has-text-warning has-text-right is-size-7">{{$type['done']}}/{{$type['length']}}</h1>
    @endforeach
</div>

<h1 class="has-text-weight-bold has-text-warning progressTitle" onclick="toggleRanged()">Ranged Weapons <span id="rangedIcon" class="showRanged"><i class="fas fa-chevron-right"></i></span></h1>
<progress class="progress is-warning is-marginless" value="{{$ranged_done}}" max="{{$ranged_length}}"></progress>
<h1 class="has-text-warning has-text-right">{{$ranged_done}}/{{$ranged_length}}</h1>

<div class="rangedStatContainer" style="margin-left: 30px">
    @foreach ($ranged as $type)
        <h1 class="has-text-warning is-size-7">{{$type['name']}}</h1>
        <progress class="progress is-warning is-marginless is-small" value="{{$type['done']}}" max="{{$type['length']}}"></progress>
        <h1 class="has-text-warning has-text-right is-size-7">{{$type['done']}}/{{$type['length']}}</h1>
    @endforeach
</div>

<h1 class="has-text-weight-bold has-text-warning">Shields</h1>
<progress class="progress is-warning is-marginless" value="{{$shield_done}}" max="{{$shield_length}}"></progress>
<h1 class="has-text-warning has-text-right">{{$shield_done}}/{{$shield_length}}</h1>

<h1 class="has-text-weight-bold has-text-warning">Outfits</h1>
<progress class="progress is-warning is-marginless" value="{{$outfit_done}}" max="{{$outfit_length}}"></progress>
<h1 class="has-text-warning has-text-right">{{$outfit_done}}/{{$outfit_length}}</h1>

<h1 class="has-text-weight-bold has-text-warning">Mounts</h1>
<progress class="progress is-warning is-marginless" value="{{$mount_done}}" max="{{$mount_length}}"></progress>
<h1 class="has-text-warning has-text-right">{{$mount_done}}/{{$mount_length}}</h1>
