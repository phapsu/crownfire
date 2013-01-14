</div>
			<div class="third_col sidebar">
				<h3>View Your Reports Online</h3>
				<form name="frmLogin" action="/crownfire/members/login_do.php" target="_top" method="post">
					<fieldset>
						<div class="login_item form_username">
							<input name="user_id" id="user_id" value="username or email" class="faded_input" type="text" onClick="this.value='';">
						</div>
						<div class="login_item form_password">
							<input name="password_holder" id="password_holder" value="password" class="faded_input" type="text" onClick="this.value='';">
							<input name="password" id="password" class="hide" type="password">
						</div>
					</fieldset>
					<img src="img/buildingreports.png" style="border: 1px solid #000; padding: 2px 2px 2px 2px;" alt="Powered by BuildingReports.com" title="Powered by BuildingReports.com" />
					<a href="javascript: void(0);" onClick="frmLogin.submit();" class="button floatright"><span>Login</span><span class="cap"></span></a>
				</form>
				<hr>
				
				<br /> &nbsp; <br />
				<br /> &nbsp; <br />
				<br /> &nbsp; <br />
				<br /> &nbsp; <br />
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="tupperware">
			<div class="third_col">
				<h4>Contact Us</h4>
				<ul class="telephone_list">
					<li><strong>Toll-free</strong> (877) 243-9664</li>
					<li><strong>Mississauga</strong> (905) 670-5122</li>
					<li><strong>Ajax</strong> (905) 427-8441</li>
					<li><strong>Newmarket</strong> (905) 868-8599</li>
					<li><strong>Brantford</strong> (519) 756-8962</li>
					<li><strong>Toronto</strong> (416) 665-6555</li>
					<li><strong>Hamilton, Burlington, Dundas</strong> (905) 521-0333</li>
					<li><strong>Fax</strong> (416) 665-1635</li>
				</ul>
			</div>
			<div class="third_col">
				<h4>Crown Fire Toronto</h4>
				<a href="#" class="map_link"><img src="img/map_toronto_new.png" alt="Google Map of Toronto Location"></a>
				<p>
					<strong>180 Trowers Rd</strong><br>
					Unit 16<br>
					Vaughan, Ontario<br>
					L4L 8A6<br>
					Canada
				</p>
			</div>
			<div class="third_col">
				<h4>Crown Fire Brantford</h4>
				<a href="#" class="map_link"><img src="img/map_brantford.png" alt="Google Map of Brantford Location"></a>
				<p>
					<strong>160 Charing Cross St.</strong><br>
					Brantford, Ontario<br>
					N3R 2J4<br>
					Canada
				</p>
			</div>
		</div>
	</div>
	<div id="copyright">
		<p class="tupperware">&copy; Copyright <?=date('Y')?> Crown Fire Equipment Ltd. All rights reserved.</p>
	</div>
</body></html>