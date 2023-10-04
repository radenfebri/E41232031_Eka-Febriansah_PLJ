
<!DOCTYPE html>
<html lang="en">


@include('layouts.head')

<body>

    @include('sweetalert::alert')

	<div class="wrapper">
		<div class="main-header">

            @include('layouts.header')


            @include('layouts.navbar')



		</div>


        @include('layouts.sidebar')


        @yield('content')
		

        @include('layouts.setting')



	</div>
	
    
    @include('layouts.script')


</body>
</html>