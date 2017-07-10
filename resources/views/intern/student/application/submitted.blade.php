your application for {!! $application->term.' '.$application->year !!} in {!! $application->city.', '.$application->country !!} has been submitted successfully.<br>
Please wait for approval and during this period, you are not able to edit this application.
<br>we will go back to your home page in 10 seconds.....

<p align="center">If you are not redirected automatically within a few
    seconds then please click on the link above.</p>
<script type="text/javascript"><!--
    setTimeout('Redirect()',10000);
    function Redirect()
    {
        location.href = '/intern/student';
    }
    // --></script>