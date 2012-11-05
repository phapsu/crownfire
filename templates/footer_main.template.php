</div>
			<div class="third_col sidebar">
				<h3>View Your Reports Online</h3>
				<form name="frmLogin" action="/members/login_do.php" target="_top" method="post">
					<fieldset>
						<div class="login_item form_username">
							<input name="user_id" id="user_id" value="username or email" class="faded_input" type="text" onClick="this.value='';">
						</div>
						<div class="login_item form_password">
							<input name="password" id="password_holder" value="password" class="faded_input" type="text" onClick="this.value='';">
						</div>
					</fieldset>
					<a href="javascript: void(0);" onClick="frmLogin.submit();" class="button floatright"><span>Login</span><span class="cap"></span></a>
				</form>
				<hr>
				<!--
				<h3>New From the Catalog</h3>
				<ul class="product_list">
					<li>
						<a href="#" class="product_image"><img src="img/product.jpg" alt="Fire Extinguisher"></a>
						<h4><a href="#">Fire Extinguisher</a> <span>$12.00</span></h4>
						<p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet lorem ipsum dolor sit amet...</p>
					</li>
					<li>
						<a href="#" class="product_image"><img src="img/product.jpg" alt="Fire Extinguisher"></a>
						<h4><a href="#">Fire Extinguisher</a> <span>$12.00</span></h4>
						<p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet lorem ipsum dolor sit amet...</p>
					</li>
					<li>
						<a href="#" class="product_image"><img src="img/product.jpg" alt="Fire Extinguisher"></a>
						<h4><a href="#">Fire Extinguisher</a> <span>$12.00</span></h4>
						<p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet lorem ipsum dolor sit amet...</p>
					</li>
					<li>
						<a href="#" class="product_image"><img src="img/product.jpg" alt="Fire Extinguisher"></a>
						<h4><a href="#">Fire Extinguisher</a> <span>$12.00</span></h4>
						<p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet lorem ipsum dolor sit amet...</p>
					</li>
				</ul>
				<a href="#" class="button floatright"><span>See More</span><span class="cap"></span></a>
				-->
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
					<li><strong>Toronto</strong> (905) 851-9119</li>
					<li><strong>Hamilton, Burlington, Dundas</strong> (905) 521-0333</li>
					<li><strong>Fax</strong> (905) 851-5760</li>
				</ul>
			</div>
			<div class="third_col">
				<h4>Crown Fire Toronto</h4>
				<div class="map_link"><img src="img/map_toronto_new.png" alt="Google Map of Toronto Location"></div>
				<p>
					<strong>180 Trowers Rd</strong><br>
					Unit #16<br>
					Woodbridge, Ontario<br>
					L4L 8A6<br>
					Canada
				</p>
			</div>
			<div class="third_col">
				<h4><a href="http://crownfire.ca/" style="text-decoration:none; border:0">Crown Fire Brantford</a></h4>
				<div class="map_link"><img src="img/map_brantford.png" alt="Google Map of Brantford Location"></div>
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
		<p class="tupperware">&copy; Copyright <?=date('Y');?> Crown Fire Equipment Ltd. All rights reserved.</p>
	</div>
        <script type="text/javascript" src="js/nivo/jquery.nivo.slider.js"></script>        
        <script type="text/javascript">
            $(window).load(function() {
                $('#nivo-slider').nivoSlider();
            });
        </script>
</body></html>