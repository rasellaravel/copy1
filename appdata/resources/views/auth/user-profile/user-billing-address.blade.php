 @extends('front-end.app')
 @section('style')

 <style type="text/css">
 	@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

 	.media {
 		padding: 30px 30px 15px
 	}

 	span.text-muted {
 		font-size: 12px
 	}

 	p.pt-1 {
 		font-size: 13px;
 		color: #8686AC;
 		cursor: pointer
 	}

 	.fas {
 		color: #ABB0B4
 	}

 	.fa-angle-right {
 		color: #E6E6E6
 	}

 	span {
 		font-size: 14px
 	}

 	.justify-content-between {
 		height: 50px;
 		margin-bottom: 10px
 	}

 	.justify-content-between:hover {
 		background-color: #EFF3FF;
 		color: #7175B5;
 		cursor: pointer
 	}

 	.justify-content-between:hover .fas {
 		color: #7175B5
 	}

 	.justify-content-between.sample {
 		background-color: #EFF3FF;
 		color: #7175B5
 	}

 	.preview {
 		color: #7175B5
 	}
 </style>
 @endsection
 @section('content')
 <section class="cart-section section">
 	<div class="row mar-0">
 		<div class="col-12 col-md-4 d-none d-md-block col-lg-3 pad-l-0">
 			<div class="sidebar">
 				@include('auth.user-profile.user-profile-navbar')
 			</div>
 		</div>
 		<div class="col-12 col-md-8 col-lg-9 pad-r-0">
 			<div class="row mar-0">
 				<div class="col-12 pad-0">
 					<div class="banner-menu">
 						<h1>User Billing Details</h1>
 						<div class="menu-ul">
 							<span class="menu-li"><a href="{{url('/')}}">Home</a></span>
 							<span class="menu-li">User Billing Details</span>
 						</div>
 					</div>
 				</div>
 				<div class="col-12 pad-0">
 					@if(Session::has('success'))
 					<div class="alert alert-success">{{Session::get('success')}}</div>
 					@endif
 					<div class="card">
 						<div class="card-header text-dark" style="background: #FF3D27">
 							Billing Details
 						</div>
 						<div class="card-body">
 							<form action="{{url('update-user-billing-address')}}" method="post" id="updateUsrInfo"  enctype="multipart/form-data">
 								@csrf
 								<div class="row">
 									<div class="col-6">
 										<div class="form-group">
 											<label>Country</label>
 											<select name="country" required="required" class="form-control">
 												<option value="">--choose--</option>

 												<option selected="selected" value="{{$user_info->billing_country}}">{{$user_info->billing_country}}</option>
 												<option value="AFGHANISTAN">AFGHANISTAN</option> 
 												<option value="ALBANIA">ALBANIA</option> 
 												<option value="ALGERIA">ALGERIA</option> 
 												<option value="AMERICAN SAMOA">AMERICAN SAMOA</option> 
 												<option value="ANDORRA">ANDORRA</option> 
 												<option value="ANGOLA">ANGOLA</option> 
 												<option value="ANGUILLA">ANGUILLA</option> 
 												<option value="ANTARCTICA">ANTARCTICA</option> 
 												<option value="ANTIGUA AND BARBUDA">ANTIGUA AND BARBUDA</option> 
 												<option value="ARGENTINA">ARGENTINA</option> 
 												<option value="ARMENIA">ARMENIA</option> 
 												<option value="ARUBA">ARUBA</option> 
 												<option value="AUSTRALIA">AUSTRALIA</option> 
 												<option value="AUSTRIA">AUSTRIA</option> 
 												<option value="AZERBAIJAN">AZERBAIJAN</option> 
 												<option value="BAHAMAS">BAHAMAS</option> 
 												<option value="BAHRAIN">BAHRAIN</option> 
 												<option value="BANGLADESH">BANGLADESH</option> 
 												<option value="BARBADOS">BARBADOS</option> 
 												<option value="BELARUS">BELARUS</option> 
 												<option value="BELGIUM">BELGIUM</option> 
 												<option value="BELIZE">BELIZE</option> 
 												<option value="BENIN">BENIN</option> 
 												<option value="BERMUDA">BERMUDA</option> 
 												<option value="BHUTAN">BHUTAN</option> 
 												<option value="BOLIVIA">BOLIVIA</option> 
 												<option value="BOSNIA AND HERZEGOVINA">BOSNIA AND HERZEGOVINA</option> 
 												<option value="BOTSWANA">BOTSWANA</option> 
 												<option value="BOUVET ISLAND">BOUVET ISLAND</option> 
 												<option value="BRAZIL">BRAZIL</option> 
 												<option value="BRITISH INDIAN OCEAN TERRITORY">BRITISH INDIAN OCEAN TERRITORY</option> 
 												<option value="BRUNEI DARUSSALAM">BRUNEI DARUSSALAM</option> 
 												<option value="BULGARIA">BULGARIA</option> 
 												<option value="BURKINA FASO">BURKINA FASO</option> 
 												<option value="BURUNDI">BURUNDI</option> 
 												<option value="CAMBODIA">CAMBODIA</option> 
 												<option value="CAMEROON">CAMEROON</option> 
 												<option value="CANADA">CANADA</option> 
 												<option value="CAPE VERDE">CAPE VERDE</option> 
 												<option value="CAYMAN ISLANDS">CAYMAN ISLANDS</option> 
 												<option value="CENTRAL AFRICAN REPUBLIC">CENTRAL AFRICAN REPUBLIC</option> 
 												<option value="CHAD">CHAD</option> 
 												<option value="CHILE">CHILE</option> 
 												<option value="CHINA">CHINA</option> 
 												<option value="CHRISTMAS ISLAND">CHRISTMAS ISLAND</option> 
 												<option value="COCOS (KEELING) ISLANDS">COCOS (KEELING) ISLANDS</option> 
 												<option value="COLOMBIA">COLOMBIA</option> 
 												<option value="COMOROS">COMOROS</option> 
 												<option value="CONGO">CONGO</option> 
 												<option value="CONGO, THE DEMOCRATIC REPUBLIC OF THE">CONGO, THE DEMOCRATIC REPUBLIC OF THE</option> 
 												<option value="COOK ISLANDS">COOK ISLANDS</option> 
 												<option value="COSTA RICA">COSTA RICA</option> 
 												<option value="COTE D'IVOIRE">COTE D'IVOIRE</option> 
 												<option value="CROATIA">CROATIA</option> 
 												<option value="CUBA">CUBA</option> 
 												<option value="CYPRUS">CYPRUS</option> 
 												<option value="CZECH REPUBLIC">CZECH REPUBLIC</option> 
 												<option value="DENMARK">DENMARK</option> 
 												<option value="DJIBOUTI">DJIBOUTI</option> 
 												<option value="DOMINICA">DOMINICA</option> 
 												<option value="DOMINICAN REPUBLIC">DOMINICAN REPUBLIC</option> 
 												<option value="ECUADOR">ECUADOR</option> 
 												<option value="EGYPT">EGYPT</option> 
 												<option value="EL SALVADOR">EL SALVADOR</option> 
 												<option value="EQUATORIAL GUINEA">EQUATORIAL GUINEA</option> 
 												<option value="ERITREA">ERITREA</option> 
 												<option value="ESTONIA">ESTONIA</option> 
 												<option value="ETHIOPIA">ETHIOPIA</option> 
 												<option value="FALKLAND ISLANDS (MALVINAS)">FALKLAND ISLANDS (MALVINAS)</option> 
 												<option value="FAROE ISLANDS">FAROE ISLANDS</option> 
 												<option value="FIJI">FIJI</option> 
 												<option value="FINLAND">FINLAND</option> 
 												<option value="FRANCE">FRANCE</option> 
 												<option value="FRENCH GUIANA">FRENCH GUIANA</option> 
 												<option value="FRENCH POLYNESIA">FRENCH POLYNESIA</option> 
 												<option value="FRENCH SOUTHERN TERRITORIES">FRENCH SOUTHERN TERRITORIES</option> 
 												<option value="GABON">GABON</option> 
 												<option value="GAMBIA">GAMBIA</option> 
 												<option value="GEORGIA">GEORGIA</option> 
 												<option value="GERMANY">GERMANY</option> 
 												<option value="GHANA">GHANA</option> 
 												<option value="GIBRALTAR">GIBRALTAR</option> 
 												<option value="GREECE">GREECE</option> 
 												<option value="GREENLAND">GREENLAND</option> 
 												<option value="GRENADA">GRENADA</option> 
 												<option value="GUADELOUPE">GUADELOUPE</option> 
 												<option value="GUAM">GUAM</option> 
 												<option value="GUATEMALA">GUATEMALA</option> 
 												<option value="GUINEA">GUINEA</option> 
 												<option value="GUINEA-BISSAU">GUINEA-BISSAU</option> 
 												<option value="GUYANA">GUYANA</option> 
 												<option value="HAITI">HAITI</option> 
 												<option value="HEARD ISLAND AND MCDONALD ISLANDS">HEARD ISLAND AND MCDONALD ISLANDS</option> 
 												<option value="HOLY SEE (VATICAN CITY STATE)">HOLY SEE (VATICAN CITY STATE)</option> 
 												<option value="HONDURAS">HONDURAS</option> 
 												<option value="HONG KONG">HONG KONG</option> 
 												<option value="HUNGARY">HUNGARY</option> 
 												<option value="ICELAND">ICELAND</option> 
 												<option value="INDIA">INDIA</option> 
 												<option value="INDONESIA">INDONESIA</option> 
 												<option value="IRAN, ISLAMIC REPUBLIC OF">IRAN, ISLAMIC REPUBLIC OF</option> 
 												<option value="IRAQ">IRAQ</option> 
 												<option value="IRELAND">IRELAND</option> 
 												<option value="ISRAEL">ISRAEL</option> 
 												<option value="ITALY">ITALY</option> 
 												<option value="JAMAICA">JAMAICA</option> 
 												<option value="JAPAN">JAPAN</option> 
 												<option value="JORDAN">JORDAN</option> 
 												<option value="KAZAKHSTAN">KAZAKHSTAN</option> 
 												<option value="KENYA">KENYA</option> 
 												<option value="KIRIBATI">KIRIBATI</option> 
 												<option value="KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF">KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF</option> 
 												<option value="KOREA, REPUBLIC OF">KOREA, REPUBLIC OF</option> 
 												<option value="KUWAIT">KUWAIT</option> 
 												<option value="KYRGYZSTAN">KYRGYZSTAN</option> 
 												<option value="LAO PEOPLE'S DEMOCRATIC REPUBLIC">LAO PEOPLE'S DEMOCRATIC REPUBLIC</option> 
 												<option value="LATVIA">LATVIA</option> 
 												<option value="LEBANON">LEBANON</option> 
 												<option value="LESOTHO">LESOTHO</option> 
 												<option value="LIBERIA">LIBERIA</option> 
 												<option value="LIBYAN ARAB JAMAHIRIYA">LIBYAN ARAB JAMAHIRIYA</option> 
 												<option value="LIECHTENSTEIN">LIECHTENSTEIN</option> 
 												<option value="LITHUANIA">LITHUANIA</option> 
 												<option value="LUXEMBOURG">LUXEMBOURG</option> 
 												<option value="MACAO">MACAO</option> 
 												<option value="MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF">MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF</option> 
 												<option value="MADAGASCAR">MADAGASCAR</option> 
 												<option value="MALAWI">MALAWI</option> 
 												<option value="MALAYSIA">MALAYSIA</option> 
 												<option value="MALDIVES">MALDIVES</option> 
 												<option value="MALI">MALI</option> 
 												<option value="MALTA">MALTA</option> 
 												<option value="MARSHALL ISLANDS">MARSHALL ISLANDS</option> 
 												<option value="MARTINIQUE">MARTINIQUE</option> 
 												<option value="MAURITANIA">MAURITANIA</option> 
 												<option value="MAURITIUS">MAURITIUS</option> 
 												<option value="MAYOTTE">MAYOTTE</option> 
 												<option value="MEXICO">MEXICO</option> 
 												<option value="MICRONESIA, FEDERATED STATES OF">MICRONESIA, FEDERATED STATES OF</option> 
 												<option value="MOLDOVA, REPUBLIC OF">MOLDOVA, REPUBLIC OF</option> 
 												<option value="MONACO">MONACO</option> 
 												<option value="MONGOLIA">MONGOLIA</option> 
 												<option value="MONTSERRAT">MONTSERRAT</option> 
 												<option value="MOROCCO">MOROCCO</option> 
 												<option value="MOZAMBIQUE">MOZAMBIQUE</option> 
 												<option value="MYANMAR">MYANMAR</option> 
 												<option value="NAMIBIA">NAMIBIA</option> 
 												<option value="NAURU">NAURU</option> 
 												<option value="NEPAL">NEPAL</option> 
 												<option value="NETHERLANDS">NETHERLANDS</option> 
 												<option value="NETHERLANDS ANTILLES">NETHERLANDS ANTILLES</option> 
 												<option value="NEW CALEDONIA">NEW CALEDONIA</option> 
 												<option value="NEW ZEALAND">NEW ZEALAND</option> 
 												<option value="NICARAGUA">NICARAGUA</option> 
 												<option value="NIGER">NIGER</option> 
 												<option value="NIGERIA">NIGERIA</option> 
 												<option value="NIUE">NIUE</option> 
 												<option value="NORFOLK ISLAND">NORFOLK ISLAND</option> 
 												<option value="NORTHERN MARIANA ISLANDS">NORTHERN MARIANA ISLANDS</option> 
 												<option value="NORWAY">NORWAY</option> 
 												<option value="OMAN">OMAN</option> 
 												<option value="PAKISTAN">PAKISTAN</option> 
 												<option value="PALAU">PALAU</option> 
 												<option value="PALESTINIAN TERRITORY, OCCUPIED">PALESTINIAN TERRITORY, OCCUPIED</option> 
 												<option value="PANAMA">PANAMA</option> 
 												<option value="PAPUA NEW GUINEA">PAPUA NEW GUINEA</option> 
 												<option value="PARAGUAY">PARAGUAY</option> 
 												<option value="PERU">PERU</option> 
 												<option value="PHILIPPINES">PHILIPPINES</option> 
 												<option value="PITCAIRN">PITCAIRN</option> 
 												<option value="POLAND">POLAND</option> 
 												<option value="PORTUGAL">PORTUGAL</option> 
 												<option value="PUERTO RICO">PUERTO RICO</option> 
 												<option value="QATAR">QATAR</option> 
 												<option value="REUNION">REUNION</option> 
 												<option value="ROMANIA">ROMANIA</option> 
 												<option value="RUSSIAN FEDERATION">RUSSIAN FEDERATION</option> 
 												<option value="RWANDA">RWANDA</option> 
 												<option value="SAINT HELENA">SAINT HELENA</option> 
 												<option value="SAINT KITTS AND NEVIS">SAINT KITTS AND NEVIS</option> 
 												<option value="SAINT LUCIA">SAINT LUCIA</option> 
 												<option value="SAINT PIERRE AND MIQUELON">SAINT PIERRE AND MIQUELON</option> 
 												<option value="SAINT VINCENT AND THE GRENADINES">SAINT VINCENT AND THE GRENADINES</option> 
 												<option value="SAMOA">SAMOA</option> 
 												<option value="SAN MARINO">SAN MARINO</option> 
 												<option value="SAO TOME AND PRINCIPE">SAO TOME AND PRINCIPE</option> 
 												<option value="SAUDI ARABIA">SAUDI ARABIA</option> 
 												<option value="SENEGAL">SENEGAL</option> 
 												<option value="SERBIA AND MONTENEGRO">SERBIA AND MONTENEGRO</option> 
 												<option value="SEYCHELLES">SEYCHELLES</option> 
 												<option value="SIERRA LEONE">SIERRA LEONE</option> 
 												<option value="SINGAPORE">SINGAPORE</option> 
 												<option value="SLOVAKIA">SLOVAKIA</option> 
 												<option value="SLOVENIA">SLOVENIA</option> 
 												<option value="SOLOMON ISLANDS">SOLOMON ISLANDS</option> 
 												<option value="SOMALIA">SOMALIA</option> 
 												<option value="SOUTH AFRICA">SOUTH AFRICA</option> 
 												<option value="SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option> 
 												<option value="SPAIN">SPAIN</option> 
 												<option value="SRI LANKA">SRI LANKA</option> 
 												<option value="SUDAN">SUDAN</option> 
 												<option value="SURINAME">SURINAME</option> 
 												<option value="SVALBARD AND JAN MAYEN">SVALBARD AND JAN MAYEN</option> 
 												<option value="SWAZILAND">SWAZILAND</option> 
 												<option value="SWEDEN">SWEDEN</option> 
 												<option value="SWITZERLAND">SWITZERLAND</option> 
 												<option value="SYRIAN ARAB REPUBLIC">SYRIAN ARAB REPUBLIC</option> 
 												<option value="TAIWAN, PROVINCE OF CHINA">TAIWAN, PROVINCE OF CHINA</option> 
 												<option value="TAJIKISTAN">TAJIKISTAN</option> 
 												<option value="TANZANIA, UNITED REPUBLIC OF">TANZANIA, UNITED REPUBLIC OF</option> 
 												<option value="THAILAND">THAILAND</option> 
 												<option value="TIMOR-LESTE">TIMOR-LESTE</option> 
 												<option value="TOGO">TOGO</option> 
 												<option value="TOKELAU">TOKELAU</option> 
 												<option value="TONGA">TONGA</option> 
 												<option value="TRINIDAD AND TOBAGO">TRINIDAD AND TOBAGO</option> 
 												<option value="TUNISIA">TUNISIA</option> 
 												<option value="TURKEY">TURKEY</option> 
 												<option value="TURKMENISTAN">TURKMENISTAN</option> 
 												<option value="TURKS AND CAICOS ISLANDS">TURKS AND CAICOS ISLANDS</option> 
 												<option value="TUVALU">TUVALU</option> 
 												<option value="UGANDA">UGANDA</option> 
 												<option value="UKRAINE">UKRAINE</option> 
 												<option value="UNITED ARAB EMIRATES">UNITED ARAB EMIRATES</option> 
 												<option value="UNITED KINGDOM">UNITED KINGDOM</option> 
 												<option value="UNITED STATES">UNITED STATES</option> 
 												<option value="UNITED STATES MINOR OUTLYING ISLANDS">UNITED STATES MINOR OUTLYING ISLANDS</option> 
 												<option value="URUGUAY">URUGUAY</option> 
 												<option value="UZBEKISTAN">UZBEKISTAN</option> 
 												<option value="VANUATU">VANUATU</option> 
 												<option value="VENEZUELA">VENEZUELA</option> 
 												<option value="VIET NAM">VIET NAM</option> 
 												<option value="VIRGIN ISLANDS, BRITISH">VIRGIN ISLANDS, BRITISH</option> 
 												<option value="VIRGIN ISLANDS, U.S.">VIRGIN ISLANDS, U.S.</option> 
 												<option value="WALLIS AND FUTUNA">WALLIS AND FUTUNA</option> 
 												<option value="WESTERN SAHARA">WESTERN SAHARA</option> 
 												<option value="YEMEN">YEMEN</option> 
 												<option value="ZAMBIA">ZAMBIA</option> 
 												<option value="ZIMBABWE">ZIMBABWE</option></select>
 											</div>
 											<div class="form-group">
 												<label>Towm</label>
 												<input type="text" value="{{$user_info->billing_town}}" placeholder="town" name="town" class="form-control">
 											</div>
 											<div class="form-group">
 												<label>Apartment</label>
 												<input type="text" value="{{$user_info->billing_apartment}}" placeholder="Apartment" name="apartment" class="form-control">
 											</div>
 										</div>
 										<div class="col-6">
 											<div class="form-group">
 												<label>District</label>
 												<input type="text" value="{{$user_info->billing_district}}" placeholder="District" name="district" class="form-control">
 											</div>
 											<div class="form-group">
 												<label>Street Address</label>
 												<input type="text" value="{{$user_info->billing_strt_address}}" placeholder="Street Address" name="street_address" class="form-control">
 											</div>
 											<div class="form-group">
 												<label>Post Code</label>
 												<input type="text" placeholder="9800" value="{{$user_info->billing_post_code}}" name="post_code" class="form-control">
 											</div>
 										</div>
 									</div>
 								</form>
 								<button type="submit" form="updateUsrInfo" class="btn btn-primary"style="background: #FF3D27; border: none";>Update</button>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>
 	<section class="search-section section d-none">
 		<div class="row mar-0">
 			<div class="col-12 d-none d-md-block col-md-4 col-lg-3 pad-l-0">
 				<div class="sidebar">
 					<div class="left_banner">
 						<a href="#"><img src="{{asset('assets/img/side1.jpg')}}" alt="Left Banner" class="cover img-responsive"></a>
 					</div>
 					<div class="left-feature">
 						<div class="feature">
 							<div class="fea-icon shiping"></div>
 							<h6>Free Shipping</h6>
 							<p>Free delivery worldwide</p>
 						</div>
 						<div class="feature">
 							<div class="fea-icon order"></div>
 							<h6>Order Online</h6>
 							<p>Hours : 8am - 11pm</p>
 						</div>
 						<div class="feature">
 							<div class="fea-icon save"></div>
 							<h6>Shop And Save</h6>
 							<p>For All Spices & Herbs</p>
 						</div>
 						<div class="feature">
 							<div class="fea-icon safe"></div>
 							<h6>Safe Shoping</h6>
 							<p>Ensure genuine 100%</p>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="col-12 col-md-8 col-lg-9 pad-r-0">
 				<div class="pro-filter-area1">
 					@include('front-end.pages.paginate-product1')
 				</div>
 			</div>
 		</div>
 	</section>
 	@endsection
 	@section('script')
 	<script>

 	</script>
 	@endsection