<!-- Hesap Oluştur -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
								<div class="modal-body modal-spa" > 
									<div class="login-grids">
										<div class="login">
											<div class="login-left">
												<ul>

												</ul>
											</div>
											<div class="login-right">
												<form>
													<h3>Hesap oluştur </h3>
													<input type="text" value="İsim" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'İsim';}" required="">
													<input type="text" value="Telefon numarası" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telefon numarası';}" required="">
													<input type="text" value="E-mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail';}" required="">	
													<input type="password" value="Şifre" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Şifre';}" required="">	
													<input type="submit" value="HESAP OLUŞTUR">
												
											</div>
												<div class="clearfix"></div>								
										</div>
										</form>
											<p>Giriş yaparak şunları kabul etmiş olursunuz: <a href="terms.html">Şartlar ve koşullar</a> & <a href="privacy.html">Gizlilik Politikası</a></p>
									</div>
								</div>
							</section>
					</div>
				</div>
			</div>
<!-- //Hesap Oluştur -->
<!-- Giriş Yap -->
		<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-left wow fadeInLeft animated" data-wow-delay=".5s"> 
                                    <img src="images/otobus3.png" class="img-fluid" style="max-width: 100%; height: auto;" alt="otobus">      
									</div>
									<div class="login-right">
										<form method="POST" action="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/'); ?>login">
											<h3>Hesabıma Giriş Yap </h3>
											<input class="email" name="email" type="text" value="Kayıt olduğunuz E-mail adresinizi giriniz" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Kayıt olduğunuz E-mail adresinizi giriniz';}" required="">	
											<input class="password" name="password" type="password" value="Şifre" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Şifre';}" required="">	
											<h4><a href="#">Şifremi unuttum</a></h4>
											<div class="single-bottom">
											</div>
											<input type="submit" value="GİRİŞ YAP">
										</form>
									</div>
									<div class="clearfix"></div>								
								</div>
								<p>Giriş yaparak şunları kabul etmiş olursunuz: <a href="terms.html">Şartlar ve koşullar</a> & <a href="privacy.html">Gizlilik Politikası</a></p>
								</div>
						</div>
					</div>
				</div>
			</div>
<!-- //Giriş Yap -->