<x-partials.header />
@include('courses.section')
@include('courses.index', ['course' => $course])
@include('courses.fee_structure')
@include('courses.section1')
<x-partials.footer />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="users/js/home.js"></script>
