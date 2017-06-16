<?php
	//if the user has already selected a previous entry
	//we need to bring him back there
	$_SESSION['nearest_branch'] = '';
	$_SESSION['select_branch'] = '';
	$_SESSION['check_in'] = '';
	$_SESSION['check_out'] = '';
	$_SESSION['check_in_time'] = '';	
	$_SESSION['nearest_branch'] = '';	
	$_SESSION['hours_of_stay'] = '';	

	$_SESSION['view_rooms'] = '';	
	$_SESSION['adults_count'] = '';	
	$_SESSION['kids_count'] = '';	

	$_SESSION['chosen_room'] = '';	
	$_SESSION['fname'] = '';	
	$_SESSION['lname'] = '';	
	$_SESSION['email'] = '';	
	$_SESSION['re_email'] = '';	
	$_SESSION['contact'] = '';	
	$_SESSION['promo_code'] = '';	
	
	$_SESSION['food_serving_time'] = '';
	$_SESSION['food_serving_checkin_time'] = '';

	$_SESSION['addon1_qty'] = 0;	
	$_SESSION['addon2_qty'] = 0;	
	$_SESSION['addon3_qty'] = 0;	
	$_SESSION['addon4_qty'] = 0;	
	$_SESSION['addon5_qty'] = 0;	
	$_SESSION['addon6_qty'] = 0;	
	$_SESSION['addon7_qty'] = 0;	
	$_SESSION['addon8_qty'] = 0;	
	$_SESSION['addon9_qty'] = 0;	
	$_SESSION['addon10_qty'] = 0;	
	

	$_SESSION['addon11_qty'] = 0;	
	$_SESSION['addon12_qty'] = 0;	
	$_SESSION['addon13_qty'] = 0;	
	$_SESSION['addon14_qty'] = 0;	
	$_SESSION['addon15_qty'] = 0;	
	$_SESSION['addon16_qty'] = 0;	
	$_SESSION['addon17_qty'] = 0;	
	$_SESSION['addon18_qty'] = 0;	
	$_SESSION['addon19_qty'] = 0;	
	$_SESSION['addon20_qty'] = 0;	
	
	$_SESSION['addon21_qty'] = 0;	
	$_SESSION['addon22_qty'] = 0;	
	$_SESSION['addon23_qty'] = 0;	
	$_SESSION['addon24_qty'] = 0;	
	$_SESSION['addon25_qty'] = 0;	
	$_SESSION['addon26_qty'] = 0;	
	$_SESSION['addon27_qty'] = 0;	
	$_SESSION['addon28_qty'] = 0;	
	$_SESSION['addon29_qty'] = 0;	
	$_SESSION['addon30_qty'] = 0;	
	

	$_SESSION['food1_qty'] = 0;	
	$_SESSION['food2_qty'] = 0;	
	$_SESSION['food3_qty'] = 0;	
	$_SESSION['food4_qty'] = 0;	
	$_SESSION['food5_qty'] = 0;	
	$_SESSION['food6_qty'] = 0;	
	$_SESSION['food7_qty'] = 0;	
	$_SESSION['food8_qty'] = 0;	
	$_SESSION['food9_qty'] = 0;	
	$_SESSION['food10_qty'] = 0;	
	

	$_SESSION['food11_qty'] = 0;	
	$_SESSION['food12_qty'] = 0;	
	$_SESSION['food13_qty'] = 0;	
	$_SESSION['food14_qty'] = 0;	
	$_SESSION['food15_qty'] = 0;	
	$_SESSION['food16_qty'] = 0;	
	$_SESSION['food17_qty'] = 0;	
	$_SESSION['food18_qty'] = 0;	
	$_SESSION['food19_qty'] = 0;	
	$_SESSION['food20_qty'] = 0;	
	
	$_SESSION['food21_qty'] = 0;	
	$_SESSION['food22_qty'] = 0;	
	$_SESSION['food23_qty'] = 0;	
	$_SESSION['food24_qty'] = 0;	
	$_SESSION['food25_qty'] = 0;	
	$_SESSION['food26_qty'] = 0;	
	$_SESSION['food27_qty'] = 0;	
	$_SESSION['food28_qty'] = 0;	
	$_SESSION['food29_qty'] = 0;	
	$_SESSION['food30_qty'] = 0;		




	$tlid= '';		
	$tldocno= '';		
	$tlsession= '';		
	
	$nearest_branch= '';
	$select_branch= '';
	$check_in= '';
	$check_out= '';
	$check_in_time= '';	
	$nearest_branch= '';	
	$hours_of_stay= '';	

	$view_rooms= '';	
	$adults_count= '';	
	$kids_count= '';	

	$chosen_room= '';	
	$fname= '';	
	$lname= '';	
	$email= '';	
	$re_email= '';	
	$contact= '';	
	$promo_code= '';	
	
	$food_serving_time= '';
	$food_serving_checkin_time= '';

	$addon1_qty= 0;	
	$addon2_qty= 0;	
	$addon3_qty= 0;	
	$addon4_qty= 0;	
	$addon5_qty= 0;	
	$addon6_qty= 0;	
	$addon7_qty= 0;	
	$addon8_qty= 0;	
	$addon9_qty= 0;	
	$addon10_qty= 0;	
	

	$addon11_qty= 0;	
	$addon12_qty= 0;	
	$addon13_qty= 0;	
	$addon14_qty= 0;	
	$addon15_qty= 0;	
	$addon16_qty= 0;	
	$addon17_qty= 0;	
	$addon18_qty= 0;	
	$addon19_qty= 0;	
	$addon20_qty= 0;	
	
	$addon21_qty= 0;	
	$addon22_qty= 0;	
	$addon23_qty= 0;	
	$addon24_qty= 0;	
	$addon25_qty= 0;	
	$addon26_qty= 0;	
	$addon27_qty= 0;	
	$addon28_qty= 0;	
	$addon29_qty= 0;	
	$addon30_qty= 0;	
	

	$food1_qty= 0;	
	$food2_qty= 0;	
	$food3_qty= 0;	
	$food4_qty= 0;	
	$food5_qty= 0;	
	$food6_qty= 0;	
	$food7_qty= 0;	
	$food8_qty= 0;	
	$food9_qty= 0;	
	$food10_qty= 0;	
	

	$food11_qty= 0;	
	$food12_qty= 0;	
	$food13_qty= 0;	
	$food14_qty= 0;	
	$food15_qty= 0;	
	$food16_qty= 0;	
	$food17_qty= 0;	
	$food18_qty= 0;	
	$food19_qty= 0;	
	$food20_qty= 0;	
	
	$food21_qty= 0;	
	$food22_qty= 0;	
	$food23_qty= 0;	
	$food24_qty= 0;	
	$food25_qty= 0;	
	$food26_qty= 0;	
	$food27_qty= 0;	
	$food28_qty= 0;	
	$food29_qty= 0;	
	$food30_qty= 0;		


	$tlid= '';		
	$tldocno= '';		
	$tlsession= '';		
				
			
?>

<script>
var _datePicker = function () {
        $(document).ready(function () {
            $('#homepage_checkin, #homepage_checkout').datetimepicker({
                format: 'LL',
                icons: {
                    time: 'fa fa-time',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
                minDate: moment()
            });
            $('#homepage_checkintime').datetimepicker({
                format: 'LT',
                icons: {
                    time: 'fa fa-time',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
            });

        });
    };
</script>


    <div class="fixed-bg-pattern"></div>
    <main class="home">
        <section class="full-banner">
            <a href="#thisLink" class="goToLink"><span class="fa fa-chevron-down"></span><span class="text">Go to website</span></a>
           
        </section>
    </footer>
