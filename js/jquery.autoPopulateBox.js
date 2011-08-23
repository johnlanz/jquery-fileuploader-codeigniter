/*
*	Class: autoPopulateBox
*	Use: Auto Populate Select box using jquery
*	Author: John Laniba (http://pixelcone.com)
*	Version: 1.0
*/

(function($){
	
	$.autoPopulateBox = {version: '1.0'};
	$.fn.autoPopulateBox = function(config) {
		
		config = $.extend({}, {
			loader: false, //image loader url
			triggerOnLoad: false,
			
			disableBoxOnChange: true,
			emptyLabel: false,
			allOptionAsEmpty: false,
			
			url: '',
			allSeparator: false,
			queryFirst: '?',
			queryOperator: '=',
			
			appendSlash: false //add slash "/" at the end of the url
			
		}, config);
		
		//configure separator
		if (config.allSeparator) {
			config.queryFirst = config.allSeparator,
			config.queryOperator = config.allSeparator;
		}
		
		//ajax loader
		if (config.loader) {
			$(this).before($('<img />').attr({
				'src': config.loader,
				'alt': 'loading',
				'id': 'apb-loader'
			}).hide());
		}
		
		//parent select box config
		var $target = {},
		url = '', selected = '', value = '',
		$self = null,
		
		autoBox = {
			onChange: function($self, $change) {
				
				$target = $($change.target);
				
				//Store Selected option
				selected = $target.val();
				
				if (config.emptyLabel) {
					$target.empty().append($('<option>').text(config.emptyLabel).val(""));
				} else {
					$target.empty();
				}
				
				//prepend all option
				if (config.allOptionAsEmpty) {
					$target.prepend($('<option>').text(config.allOptionAsEmpty).val(""));
				}
				
				//if the value is empty dont to proceed to ajax call
				if ( !$self.val() ) {
					autoBox.complete($self, $change);
					return;
				}
				
				//show loader
				if (config.loader) {
					$('#apb-loader').show().insertAfter($self);
				}
				
				if (config.disableBoxOnChange) {
					$self.attr('disabled', 'disabled');
				}
				
				url = config.url;
				if (typeof($change.url) != 'undefined'){
					url = $change.url;
				}
				
				//append to URL if exist
				if ($.isFunction($change.appendToUrl)){
					url += $change.appendToUrl();
				} else {
					
					//remove the last slash on url
					url = url.replace(/\/$/g, "");
					
					url += config.queryFirst;
					
					//get attribute name
					if ($self.attr('apBoxName') != null) {
						$name = $self.attr('apBoxName');
					} else {
						$name = $self.attr('name');
					}
					
					value = $self.val().toString();
					url += $name + config.queryOperator + value.replace(/\,/g, "-");
				}
				
				if (config.appendSlash) {
					url += '/';
				}
				
				//Call AJAX and return data as JSON object
				$.ajax({
					url: url,
					type: 'get',
					dataType: 'json'
				})
				.success(function(data) {
					//Display data on your format
					if ($.isFunction($change.formatData)) {
						$change.formatData($target, data);
					} else {
						$.each(data, function(id,value){
							if (value) {
								$target.append( $("<option/>").text(value).val(id) );
							}
						});
					}
					if (selected) {
						$target.val(selected);
					}
				})
				.complete(function(jqXHR, textStatus) {
					autoBox.complete($self, $change);
				});
				
			},
			
			complete: function($self, $change) {
				$('#apb-loader').hide();
				$self.removeAttr('disabled');
				
				if (typeof($change.change) != 'undefined'){
					$($change.target).trigger('change');
				}
				
				//callback
				if ($.isFunction($change.callback)) {
					$change.callback($self);
				}
			},
			
			changeConfig: function() {
				/*if ($.isFunction(config.changeCallback)) {
					config.change = config.changeCallback();
				}*/
			}
		}
		
		//Parent configuration
		$(this).change(function(){
			autoBox.onChange($(this), config[config.change]);
		});
		
		if (config.triggerOnLoad){
			$(this).trigger('change');
		}
		
		//Children configuration
		$.each(config, function(index, val){
			if (typeof(config[index].change) != 'undefined') {
				$(val.target).change(function(){
					
					autoBox.onChange($(this), config[val.change]);
					
				});
			}
		});
		
		return this;
	}
})(jQuery);