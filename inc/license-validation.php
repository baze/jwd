<div class="validate_serial_key">
	
	<p>Bitte geben Sie hier Ihren BrainBox-Lizenzschlüssel ein.</p>

	<label style="display:inline-block; width:10em;">Lizenzschlüssel:</label>
	<input style="display:inline-block; width:20em;" type="text" id="serial_key"><br />
	<br />
	<label style="display:inline-block; width:10em;">Webseite:</label>
	<input style="display:inline-block; width:20em;" type="text" id="serial_key_uuid"><br />
	<br />
	<input type="button" class="button button-primary" id="validate" value="Lizenz verifizieren">
	<input type="hidden" id="sku" value="JWD-BB-001">
	<p id="result"></p>

	<script type="text/javascript">
		jQuery(function(){
			jQuery("input#validate").on("click", function(){
				jQuery.ajax({
					url: "https://shop.jwdsign.de/?wc-api=validate_serial_key",
					type: "post",
					dataType: "json",
					data: {
						serial: jQuery("input#serial_key").val(),
						uuid: jQuery("input#serial_key_uuid").val(),
						sku: jQuery("input#sku").val()
					},
					success: function( response ) {
						jQuery("p#result").text('');
						if ( response.success == "true" ) {
							jQuery("p#result").append( '<p style="background: green; color: white">'+response.message+'.</p>' );

						} else {
							jQuery("p#result").append( '<p style="background: red; color: white">'+response.message+'.</p>' );
							
						}
					}
				});
			});
		});
	</script>

</div>