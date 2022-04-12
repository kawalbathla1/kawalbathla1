<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
 

<div class="Polaris-Layout__Section ">
	<div class="Polaris-Card">
		<div class="Polaris-Card__Header">
            <!-- custom controller   (mode)-->
			 </div>
          
		<div class="Polaris-Card__Section">
			<div class="Polaris-FormLayout">
				<div role="group" class="Polaris-FormLayout--grouped">
					<!----------------   FormLayout__Items   ----- Start ------------ -------- ---->
					<div class="Polaris-FormLayout__Items">
						<!----------------   FormLayout__Items1 ----- Start ------------ -------- ---->
						<div class="Polaris-FormLayout__Item">
							<div>
								<div class="">
									<div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="PolarisTextField4Label" for="PolarisTextField4" class="Polaris-Label__Text">Email Host</label>
										</div>
									</div>
									<div class="Polaris_Conn">
										<div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
											<div class="Polaris-TextField Polaris-TextField--hasValue">
												<input id="PolarisTextField4 hostdata" autocomplete="email" class="Polaris-TextField__Input myform" type="email" aria-labelledby="PolarisTextField4Label" aria-invalid="false" value="" required>
												<div class="Polaris-TextField__Backdrop"></div>
											</div> <span class="errorMsg" id="hostmsg" style="color: red; display: none;">*Only characters are allowed.</span> </div>
									</div>
								</div>
								<div id="PolarisPortalsContainer"></div>
							</div>
						</div>
						<!----------------   FormLayout__Item1  End----------------- -------- ---->
						<!----------------   FormLayout__Items2 ----- Start ------------ -------- ---->
						<div class="Polaris-FormLayout__Item">
							<div>
								<div class="">
									<div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="PolarisTextField4Label" for="PolarisTextField4" class="Polaris-Label__Text">User Name</label>
										</div>
									</div>
									<div class="Polaris-Connected">
										<div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
											<div class="Polaris-TextField Polaris-TextField--hasValue">
												<input id="PolarisTextField4" autocomplete="email" class="Polaris-TextField__Input userdata" type="email" aria-labelledby="PolarisTextField4Label" aria-invalid="false" value="" placeholder="Ankita Sharma" required>
												<div class="Polaris-TextField__Backdrop"></div>
											</div>
										</div>
									</div>
								</div>
								<div id="PolarisPortalsContainer"></div>
							</div>
						</div>
						<!----------------   FormLayout__Item2  End----------------- -------- ---->
						<!----------------   FormLayout__Items3 ----- Start ------------ -------- ---->
						<div class="Polaris-FormLayout__Item">
							<div>
								<div class="">
									<div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="PolarisTextField4Label" for="PolarisTextField4" class="Polaris-Label__Text">Password</label>
										</div>
									</div>
									<div class="Polaris-Connected">
										<div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
											<div class="Polaris-TextField Polaris-TextField--hasValue">
												<input type="password" id="PolarisTextField4" autocomplete="email" class="Polaris-TextField__Input mypassword" type="email" aria-labelledby="PolarisTextField4Label" aria-invalid="false" value="">
												<div class="Polaris-TextField__Backdrop"></div>
											</div>
										</div>
									</div>
								</div>
								<div id="PolarisPortalsContainer"></div>
							</div>
						</div>
						<!----------------   FormLayout__Item3  End----------------- -------- ---->
						<!----------------   FormLayout__Items4 ----- Start ------------ -------- ---->
						<div class="Polaris-FormLayout__Item">
							<div>
								<div class="">
									<div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="PolarisTextField4Label" for="PolarisTextField4" class="Polaris-Label__Text">Form Email</label>
										</div>
									</div>
									<div class="Polaris-Connected">
										<div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
											<div class="Polaris-TextField Polaris-TextField--hasValue">
												<input id="PolarisTextField4" autocomplete="email" class="Polaris-TextField__Input emaildata" type="email" aria-labelledby="PolarisTextField4Label" aria-invalid="false" value="" placeholder="Ankita.Sharma@shinedezign.email">
												<div class="Polaris-TextField__Backdrop"></div>
											</div> <span class="errorMsg" id="formdatamsg" style="color: red; display: none;">*please enter email.</span> </div>
									</div>
								</div>
								<div id="PolarisPortalsContainer"></div>
							</div>
						</div>
						<!----------------   FormLayout__Item4  End----------------- -------- ---->
						<!----------------   FormLayout__Items5 ----- Start ------------ -------- ---->
						<div class="Polaris-FormLayout__Item">
							<div>
								<div class="">
									<div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="PolarisTextField4Label" for="PolarisTextField4" class="Polaris-Label__Text">Encryption</label>
										</div>
									</div>
									<div class="Polaris-Select">
										<select id="encrypt_select" class="Polaris-Select__Input encrypted_select" aria-invalid="false">
											<option value="tls">TLS</option>
											<option value="html">HTML</option>
											<option value="css">CSS</option>
											<option value="js">JS</option>
										</select>
										<div class="Polaris-Select__Content encrypt_select_text" id="encdata" aria-hidden="true"><span class="SelectedOption" id="optionEnc">TLS</span><span class="Polaris-Select__Icon"><span class="Polaris-Icon"><span class="Polaris-VisuallyHidden"></span>
											<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
												<path d="m10 16-4-4h8l-4 4zm0-12 4 4H6l4-4z"></path>
											</svg>
											</span>
											</span>
										</div>
										<div class="Polaris-Select__Backdrop"></div>
									</div>
								</div>
								<div id="PolarisPortalsContainer"></div>
							</div>
						</div>
						<!----------------   FormLayout__Item5 End----------------- -------- ---->
						<!----------------   FormLayout__Items6 ----- Start ------------ -------- ---->
						<div class="Polaris-FormLayout__Item">
							<div>
								<div class="">
									<div class="Polaris-Labelled__LabelWrapper">
										<div class="Polaris-Label">
											<label id="PolarisTextField4Label" for="PolarisTextField4" class="Polaris-Label__Text">Port Number</label>
										</div>
									</div>
									<div class="Polaris-Connected">
										<div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
											<div class="Polaris-TextField Polaris-TextField--hasValue">
												<input id="PolarisTextField4" autocomplete="email" class="Polaris-TextField__Input portnum" type="email" aria-labelledby="PolarisTextField4Label" aria-invalid="false" value="" placeholder="587">
												<div class="Polaris-TextField__Backdrop"></div>
											</div> <span class="errorMsg" id="checkmsg" style="color: red; display: none;">*Port number is not valid.</span> </div>
									</div>
								</div>
								<div id="PolarisPortalsContainer"></div>
							</div>
						</div>
						<!----------------   FormLayout__Item6 End----------------- -------- ---->
						<!----------------   FormLayout__Items7 ----- Start ------------ -------- ---->
						<div class="Polaris-FormLayout__Item">
							<div>
								<button class="Polaris-Button save" type="button"><span class="Polaris-Button__Content save"><span class="Polaris-Button__Text save_form">Save Form</span></span>
								</button>
								<div id="PolarisPortalsContainer"></div>
							</div>
						</div>
						<!----------------   FormLayout__Item7   End----------------- -------- ---->
					</div>
					<!----------------   FormLayout__Items   End----------------- -------- ---->
				</div>
			</div>
		</div>
	</div>
</div>


</body>
</html>