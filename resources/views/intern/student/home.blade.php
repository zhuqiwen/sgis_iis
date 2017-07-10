<?php
$user = Auth::user();
$applications = \App\Models\InternApplication::where('user_id', $user->id)->get();
?>

shows info of student, such as


<p>
    Hi, {!! $user->first_name !!}
</p>

<p>
    @if($applications->where('is_submitted', 0)->count() === 0)
        you have no application that needs to be submitted
    @else
        {!! $applications->where('is_submitted', 0)->count() !!} application(s) need to be submitted.
    @endif


</p>
<p>
    things to do, such as submitting journal, and site evaluation
</p>
<p>
    other info
</p>



<a href="application/organization">Create a new internship application</a>
