
(function ($) {
	$.fn.formbuilder = function (options) {
		// Extend the configuration options with user-provided
		var defaults = {
			save_url: false,
			load_url: false,
			control_box_target: false,
			serialize_prefix: 'frmb',
			css_ol_sortable_class : 'ol_opt_sortable',
			messages: {
				save				: "Next",
				add_new_field		: "Add New Field...",
				text				: "Text Box",
				title				: "Title",
				paragraph			: "Paragraph",
				checkboxes			: "Checkbox List",
				radio				: "Radio List",
				select				: "Select List",
				text_field			: "Text Field",
				label				: "Label",
				paragraph_field		: "Paragraph",
				select_options		: "Select Options",
				add					: "Add",
				checkbox_group		: "Checkbox Group",
				remove_message		: "Are you sure you want to remove this element?",
				remove				: "Remove",
				radio_group			: "Radio Group",
				selections_message	: "Allow Multiple Selections",
				hide				: "-",
				required			: "Required",
				show				: "+",
				file				: "File Upload",
				password			: "Password",
				reset				: "Reset",
				submit				: "Submit",
				button				: "Button",
				color				: "Color",
				date				: "Date",
				datetime			: "Date & Time",
				datetimelocal		: "Date & Time Local",
				email				: "Email",
				month				: "Month",
				number				: "Number",
				range				: "Range",
				search				: "Search",
				tel					: "Telephone Number",
				time				: "Time",
				url					: "URL",
				week				: "Week",
				data_list			: "Data List"
			}
		};
		var opts = $.extend(defaults, options);
		var frmb_id = 'frmb-' + $('ul[id^=frmb-]').length++;
		return this.each(function () {
			var ul_obj = $(this).append('<ul id="' + frmb_id + '" class="frmb"></ul>').find('ul');
			var field = '', field_type = '', last_id = 1, help, form_db_id;
			// Add a unique class to the current element
			$(ul_obj).addClass(frmb_id);
			// load existing form data
			if (opts.load_url) {
				$.getJSON(opts.load_url, function(json) {
					form_db_id = json.form_id;
					fromJson(json.form_structure);
				});
			}
			// Create form control select box and add into the editor
			var controlBox = function (target) {
					var select = '';
					var box_content = '';
					var save_button = '';
					var box_id = frmb_id + '-control-box';
					var save_id = frmb_id + '-save-button';
					// Add the available options
					select += '<option value="0">' + opts.messages.add_new_field + '</option>';
					select += '<optgroup label="Text">';
					select += '<option value="email">' + opts.messages.email + '</option>';
					select += '<option value="number">' + opts.messages.number + '</option>';
					select += '<option value="textarea">' + opts.messages.paragraph + '</option>';
					select += '<option value="password">' + opts.messages.password + '</option>';
					select += '<option value="search">' + opts.messages.search + '</option>';
					select += '<option value="input_text">' + opts.messages.text + '</option>';
					select += '<option value="url">' + opts.messages.url + '</option>';
					select += '</option>';
					select += '<optgroup label="List">';
					select += '<option value="checkbox">' + opts.messages.checkboxes + '</option>';
					select += '<option value="data_list">' + opts.messages.data_list + '</option>';
					select += '<option value="radio">' + opts.messages.radio + '</option>';
					select += '<option value="select">' + opts.messages.select + '</option>';
					select += '</option>';
					select += '<optgroup label="Date & Time">';
					select += '<option value="date">' + opts.messages.date + '</option>';
					select += '<option value="datetime">' + opts.messages.datetime + '</option>';
					select += '<option value="datetime-local">' + opts.messages.datetimelocal + '</option>';
					select += '<option value="month">' + opts.messages.month + '</option>';
					select += '<option value="time">' + opts.messages.time + '</option>';
					select += '<option value="week">' + opts.messages.week + '</option>';
					select += '</option>';
					select += '<optgroup label="Button">';
					select += '<option value="button">' + opts.messages.button + '</option>';
					select += '<option value="reset">' + opts.messages.reset + '</option>';
					select += '<option value="submit">' + opts.messages.submit + '</option>';
					select += '</option>';
					select += '<optgroup label="Others">';
					select += '<option value="color">' + opts.messages.color + '</option>';
					select += '<option value="file">' + opts.messages.file + '</option>';
					select += '<option value="range">' + opts.messages.range + '</option>';
					select += '<option value="tel">' + opts.messages.tel + '</option>';
					select += '</option>';
					// Build the control box and search button content
					box_content = '<div class="select-container"><select id="' + box_id + '" class="frmb-control">' + select + '</select></div>';
					save_button = '<input type="submit" id="' + save_id + '" class="frmb-submit" value="' + opts.messages.save + '"/>';
					// Insert the control box into page
					if (!target) {
						$(ul_obj).before(box_content);
					} else {
						$(target).append(box_content);
					}
					// Insert the search button
					$(ul_obj).after(save_button);
					// Set the form save action
					$('#' + save_id).click(function () {
						save();
						return false;
					});
					// Add a callback to the select element
					$('#' + box_id).change(function () {
						appendNewField($(this).val());
						$(this).val(0).blur();
						// This solves the scrollTo dependency
						$('html, body').animate({
							scrollTop: $('#frm-' + (last_id - 1) + '-item').offset().top
						}, 500);
						return false;
					});
				}(opts.control_box_target);
			// Json parser to build the form builder
			var fromJson = function (json) {
					var values = '';
					var options = false;
					// Parse json
					$(json).each(function () {
						// checkbox type
						if (this.cssClass === 'checkbox') {
							options = [this.title];
							values = [];
							$.each(this.values, function () {
								values.push([this.value, this.baseline]);
							});
						}
						// radio type
						else if (this.cssClass === 'radio') {
							options = [this.title];
							values = [];
							$.each(this.values, function () {
								values.push([this.value, this.baseline]);
							});
						}
						// select type
						else if (this.cssClass === 'select') {
							options = [this.title, this.multiple];
							values = [];
							$.each(this.values, function () {
								values.push([this.value, this.baseline]);
							});
						}
						else {
							values = [this.values];
						}
						appendNewField(this.cssClass, values, options, this.required);
					});
				};
			// Wrapper for adding a new field
			var appendNewField = function (type, values, options, required) {
					field = '';
					field_type = type;
					if (typeof (values) === 'undefined') {
						values = '';
					}
					switch (type) {
					case 'input_text':
						appendTextInput(values, required);
						break;
					case 'file':
						appendFile(values,required);
						break;
					case 'password':
						appendPassword(values,required);
						break;
					case 'reset':
						appendReset(values,required);
						break;
					case 'submit':
						appendSubmit(values,required);
						break;
					case 'button':
						appendButton(values,required);
						break;
					case 'color':
						appendColor(values,required);
						break;
					case 'date':
						appendDate(values,required);
						break;
					case 'datetime':
						appendDateTime(values,required);
						break;
					case 'datetime-local':
						appendDateTimeLocal(values,required);
						break;
					case 'email':
						appendEmail(values,required);
						break;
					case 'month':
						appendMonth(values,required);
						break;
					case 'number':
						appendNumber(values,required);
						break;
					case 'range':
						appendRange(values,required);
						break;
					case 'search':
						appendSearch(values,required);
						break;
					case 'tel':
						appendTel(values,required);
						break;
					case 'time':
						appendTime(values,required);
						break;
					case 'url':
						appendURL(values,required);
						break;
					case 'week':
						appendWeek(values,required);
						break;
					case 'data_list':
						appendDataList(values,required);
						break;
					case 'textarea':
						appendTextarea(values, required);
						break;
					case 'checkbox':
						appendCheckboxGroup(values, options, required);
						break;
					case 'radio':
						appendRadioGroup(values, options, required);
						break;
					case 'select':
						appendSelectList(values, options, required);
						break;
					}
				};
			// single line input type="text"
			var appendTextInput = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.text, field, required, help);
				};
			// single line input type="file"
			var appendFile = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.file, field, required, help);
				};
			// single line input type="password"
			var appendPassword = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.password, field, required, help);
				};
			// single line input type="reset"
			var appendReset = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.reset, field, required, help);
				};
			// single line input type="submit"
			var appendSubmit = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.submit, field, required, help);
				};
			// single line input type="button"
			var appendButton = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.button, field, required, help);
				};
			// single line input type="color"
			var appendColor = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.color, field, required, help);
				};
			// single line input type="date"
			var appendDate = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.date, field, required, help);
				};
			// single line input type="datetime"
			var appendDateTime = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.datetime, field, required, help);
				};
			// single line input type="datetime-local"
			var appendDateTimeLocal = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.datetimelocal, field, required, help);
				};
			// single line input type="email"
			var appendEmail = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.email, field, required, help);
				};
			// single line input type="month"
			var appendMonth = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.month, field, required, help);
				};
			// single line input type="number"
			var appendNumber = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.number, field, required, help);
				};
			// single line input type="range"
			var appendRange = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.range, field, required, help);
				};
			// single line input type="search"
			var appendSearch = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.search, field, required, help);
				};
			// single line input type="tel"
			var appendTel = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.tel, field, required, help);
				};
			// single line input type="time"
			var appendTime = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.time, field, required, help);
				};
			// single line input type="url"
			var appendURL = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.url, field, required, help);
				};
			// single line input type="week"
			var appendWeek = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input class="fld-title" id="title-' + last_id + '" type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.week, field, required, help);
				};
			// multi-line textarea
			var appendTextarea = function (values, required) {
					field += '<label>' + opts.messages.label + '</label>';
					field += '<input type="text" value="' + values + '" />';
					help = '';
					appendFieldLi(opts.messages.paragraph_field, field, required, help);
				};
			// adds a checkbox element
			var appendCheckboxGroup = function (values, options, required) {
					var title = '';
					if (typeof (options) === 'object') {
						title = options[0];
					}
					field += '<div class="chk_group">';
					field += '<div class="frm-fld"><label>' + opts.messages.title + '</label>';
					field += '<input type="text" name="title" value="' + title + '" /></div>';
					field += '<div class="false-label">' + opts.messages.select_options + '</div>';
					field += '<div class="fields">';

					field += '<div><ol class="' + opts.css_ol_sortable_class + '">';

					if (typeof (values) === 'object') {
						for (i = 0; i < values.length; i++) {
							field += checkboxFieldHtml(values[i]);
						}
					}
					else {
						field += checkboxFieldHtml('');
					}

					field += '</ol></div>';

					field += '<div class="add-area"><a href="#" class="add add_ck"> + </a></div>';
					field += '</div>';
					field += '</div>';
					help = '';
					appendFieldLi(opts.messages.checkbox_group, field, required, help);

					$('.'+ opts.css_ol_sortable_class).sortable(); // making the dynamically added option fields sortable.
				};
			// Checkbox field html, since there may be multiple
			var checkboxFieldHtml = function (values) {
					var checked = false;
					var value = '';
					if (typeof (values) === 'object') {
						value = values[0];
						checked = ( values[1] === 'false' || values[1] === 'undefined' ) ? false : true;
					}
					field = '<li>';
					field += '<div>';
					field += '<input type="checkbox"' + (checked ? ' checked="checked"' : '') + ' />';
					field += '<input type="text" value="' + value + '" />';
					field += '<a href="#" class="remove" title="' + opts.messages.remove_message + '">' + opts.messages.remove + '</a>';
					field += '</div></li>';
					return field;
				};
			// adds a radio element
			var appendRadioGroup = function (values, options, required) {
					var title = '';
					if (typeof (options) === 'object') {
						title = options[0];
					}
					field += '<div class="rd_group">';
					field += '<div class="frm-fld"><label>' + opts.messages.title + '</label>';
					field += '<input type="text" name="title" value="' + title + '" /></div>';
					field += '<div class="false-label">' + opts.messages.select_options + '</div>';
					field += '<div class="fields">';

					field += '<div><ol class="' + opts.css_ol_sortable_class + '">';

					if (typeof (values) === 'object') {
						for (i = 0; i < values.length; i++) {
							field += radioFieldHtml(values[i], 'frm-' + last_id + '-fld');
						}
					}
					else {
						field += radioFieldHtml('', 'frm-' + last_id + '-fld');
					}

					field += '</ol></div>';

					field += '<div class="add-area"><a href="#" class="add add_rd"> + </a></div>';
					field += '</div>';
					field += '</div>';
					help = '';
					appendFieldLi(opts.messages.radio_group, field, required, help);

					$('.'+ opts.css_ol_sortable_class).sortable(); // making the dynamically added option fields sortable. 
				};
			// Radio field html, since there may be multiple
			var radioFieldHtml = function (values, name) {
					var checked = false;
					var value = '';
					if (typeof (values) === 'object') {
						value = values[0];
						checked = ( values[1] === 'false' || values[1] === 'undefined' ) ? false : true;
					}
					field = '<li>'; 
					field += '<div>';
					field += '<input type="radio"' + (checked ? ' checked="checked"' : '') + ' name="radio_' + name + '" />';
					field += '<input type="text" value="' + value + '" />';
					field += '<a href="#" class="remove" title="' + opts.messages.remove_message + '">' + opts.messages.remove + '</a>';
					field += '</div></li>';

					return field;
				};
			// adds a data-list/option element
			var appendDataList = function (values, options, required) {
					var multiple = false;
					var title = '';
					if (typeof (options) === 'object') {
						title = options[0];
						multiple = options[1] === 'true' || options[1] === 'checked' ? true : false;
					}
					field += '<div class="opt_group">';
					field += '<div class="frm-fld"><label>' + opts.messages.title + '</label>';
					field += '<input type="text" name="title" value="' + title + '" /></div>';
					field += '';
					field += '<div class="false-label">' + opts.messages.select_options + '</div>';
					field += '<div class="fields">';
					field += '<input type="checkbox" name="multiple"' + (multiple ? 'checked="checked"' : '') + '>';
					field += '<label class="auto">' + opts.messages.selections_message + '</label>';

					field += '<div><ol class="' + opts.css_ol_sortable_class + '">';

						if (typeof (values) === 'object') {
							for (i = 0; i < values.length; i++) {
								field += data_listFieldHtml(values[i], multiple);
							}
						}
						else {
							field += data_listFieldHtml('', multiple);
						}

					field += '</ol></div>';

					field += '<div class="add-area"><a href="#" class="add add_opt"> + </a></div>';
					field += '</div>';
					field += '</div>';
					help = '';
					appendFieldLi(opts.messages.data_list, field, required, help);

					$('.'+ opts.css_ol_sortable_class).sortable(); // making the dynamically added option fields sortable.  
				};
			// datalist field html, since there may be multiple
			var data_listFieldHtml = function (values, multiple) {
					if (multiple) {
						return checkboxFieldHtml(values);
					}
					else {
						return radioFieldHtml(values);
					}
				};
			// adds a select/option element
			var appendSelectList = function (values, options, required) {
					var multiple = false;
					var title = '';
					if (typeof (options) === 'object') {
						title = options[0];
						multiple = options[1] === 'true' || options[1] === 'checked' ? true : false;
					}
					field += '<div class="opt_group">';
					field += '<div class="frm-fld"><label>' + opts.messages.title + '</label>';
					field += '<input type="text" name="title" value="' + title + '" /></div>';
					field += '';
					field += '<div class="false-label">' + opts.messages.select_options + '</div>';
					field += '<div class="fields">';
					field += '<input type="checkbox" name="multiple"' + (multiple ? 'checked="checked"' : '') + '>';
					field += '<label class="auto">' + opts.messages.selections_message + '</label>';

					field += '<div><ol class="' + opts.css_ol_sortable_class + '">';

						if (typeof (values) === 'object') {
							for (i = 0; i < values.length; i++) {
								field += selectFieldHtml(values[i], multiple);
							}
						}
						else {
							field += selectFieldHtml('', multiple);
						}

					field += '</ol></div>';

					field += '<div class="add-area"><a href="#" class="add add_opt"> + </a></div>';
					field += '</div>';
					field += '</div>';
					help = '';
					appendFieldLi(opts.messages.select, field, required, help);

					$('.'+ opts.css_ol_sortable_class).sortable(); // making the dynamically added option fields sortable.  
				};
			// Select field html, since there may be multiple
			var selectFieldHtml = function (values, multiple) {
					if (multiple) {
						return checkboxFieldHtml(values);
					}
					else {
						return radioFieldHtml(values);
					}
				};
			// Appends the new field markup to the editor
			var appendFieldLi = function (title, field_html, required, help) {
					if (required) {
						required = required === 'checked' ? true : false;
					}
					var li = '';
					li += '<li id="frm-' + last_id + '-item" class="' + field_type + '">';
					li += '<div class="legend">';
				
				
//					li += '<input type="radio" class="radioc" id="form-style1" name="form-style" value='1' required > ';
//					li += '<label for="form-style1">Style One</label>';
//					li += '<a class="radio"><i class="dot">.</i></a>';
					
					li += '<a id="del_' + last_id + '" class="del-button delete-confirm" href="#" title="' + opts.messages.remove_message + '"><span>X</span></a>';					
					li += '<a id="frm-' + last_id + '" class="toggle-form" href="#">' + opts.messages.hide + '</a> ';
					
					li += '<strong id="txt-title-' + last_id + '">' + title + '</strong></div>';
					li += '<div id="frm-' + last_id + '-fld" class="frm-holder">';
					li += '<div class="frm-elements">';
					li += '<div class="frm-fld"><label for="required-' + last_id + '">' + opts.messages.required + '</label>';
					li += '<input class="required" type="checkbox" value="1" name="required-' + last_id + '" id="required-' + last_id + '"' + (required ? ' checked="checked"' : '') + ' /></div>';
					li += field;
					li += '</div>';
					li += '</div>';
					li += '</li>';
					$(ul_obj).append(li);
					$('#frm-' + last_id + '-item').hide();
					$('#frm-' + last_id + '-item').animate({
						opacity: 'show',
						height: 'show'
					}, 'slow');
					last_id++;
				};
			// handle field delete links
			$('.frmb').delegate('.remove', 'click', function () {
				$(this).parent('div').animate({
					opacity: 'hide',
					height: 'hide',
					marginBottom: '0px'
				}, 'fast', function () {
					$(this).remove();
				});
				return false;
			});
			// handle field display/hide
			$('.frmb').delegate('.toggle-form', 'click', function () {
				var target = $(this).attr("id");
				if ($(this).html() === opts.messages.hide) {
					$(this).removeClass('open').addClass('closed').html(opts.messages.show);
					$('#' + target + '-fld').animate({
						opacity: 'hide',
						height: 'hide'
					}, 'slow');
					return false;
				}
				if ($(this).html() === opts.messages.show) {
					$(this).removeClass('closed').addClass('open').html(opts.messages.hide);
					$('#' + target + '-fld').animate({
						opacity: 'show',
						height: 'show'
					}, 'slow');
					return false;
				}
				return false;
			});
			// handle delete confirmation
			$('.frmb').delegate('.delete-confirm', 'click', function () {
				var delete_id = $(this).attr("id").replace(/del_/, '');
				if (confirm($(this).attr('title'))) {
					$('#frm-' + delete_id + '-item').animate({
						opacity: 'hide',
						height: 'hide',
						marginBottom: '0px'
					}, 'slow', function () {
						$(this).remove();
					});
				}
				return false;
			});
			// Attach a callback to add new checkboxes
			$('.frmb').delegate('.add_ck', 'click', function () {
				$(this).parent().before(checkboxFieldHtml());
				return false;
			});
			// Attach a callback to add new options
			$('.frmb').delegate('.add_opt', 'click', function () {
				$(this).parent().before(selectFieldHtml('', false));
				return false;
			});
			// Attach a callback to add new radio fields
			$('.frmb').delegate('.add_rd', 'click', function () {
				$(this).parent().before(radioFieldHtml(false, $(this).parents('.frm-holder').attr('id')));
				return false;
			});
			// saves the serialized data to the server
			var save = function () {				
					if (opts.save_url) {
						$.ajax({
							type: "POST",
							url: opts.save_url,
							data: $(ul_obj).serializeFormList({
								prepend: opts.serialize_prefix
							}) + "&form_id=" + form_db_id,
							success: function () {
								window.location.assign("download.php");
								}
						});
					}
				};
		});
	};
})(jQuery);
/**
 * jQuery Form Builder List Serialization Plugin
 * Copyright (c) 2009 Mike Botsko, Botsko.net LLC (http://www.botsko.net)
 * Originally designed for AspenMSM, a CMS product from Trellis Development
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * Copyright notice and license must remain intact for legal use
 * Modified from the serialize list plugin
 * http://www.botsko.net/blog/2009/01/jquery_serialize_list_plugin/
 */
(function ($) {
	$.fn.serializeFormList = function (options) {
		//By srini for style-number loacation
		var style_pos;
		// Extend the configuration options with user-provided
		var defaults = {
			prepend: 'ul',
			is_child: false,
			attributes: ['class']
		};
		var opts = $.extend(defaults, options);
		if (!opts.is_child) {
			opts.prepend = '&' + opts.prepend;
		}
		var serialStr = '';
		// Begin the core plugin
		this.each(function () {
			var ul_obj = this;
			var li_count = 0;
			var c = 1;
			$(this).children().each(function () {
				for (att = 0; att < opts.attributes.length; att++) {
					var key = (opts.attributes[att] === 'class' ? 'cssClass' : opts.attributes[att]);
					serialStr += opts.prepend + '[' + li_count + '][' + key + ']=' + encodeURIComponent($(this).attr(opts.attributes[att]));
					// append the form field values
					if (opts.attributes[att] === 'class') {
						serialStr += opts.prepend + '[' + li_count + '][required]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input.required').is(':checked'));
						switch ($(this).attr(opts.attributes[att])) {
						case 'input_text':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());
							break;
						case 'file':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());		
							break;
						case 'password':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());			
							break;
						case 'reset':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());			
							break;
						case 'submit':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());					
							break;
						case 'button':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());					
							break;
						case 'color':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());					
							break;
						case 'date':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());							
							break;			
						case 'datetime':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());						
							break;		
						case 'datetime-local':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());							
							break;		
						case 'email':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());							
							break;			
						case 'month':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());							
							break;			
						case 'number':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());							
							break;			
						case 'range':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());							
							break;			
						case 'search':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());						
							break;				
						case 'tel':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());						
						case 'time':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());						
							break;			
						case 'url':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());					
						case 'week':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());						
							break;
						case 'textarea':
							serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($('#' + $(this).attr('id') + ' input[type=text]').val());
							break;
						case 'checkbox':
							c = 1;
							$('#' + $(this).attr('id') + ' input[type=text]').each(function () {
								if ($(this).attr('name') === 'title') {
									serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($(this).val());
								}
								else {
									serialStr += opts.prepend + '[' + li_count + '][values][' + c + '][value]=' + encodeURIComponent($(this).val());
									serialStr += opts.prepend + '[' + li_count + '][values][' + c + '][baseline]=' + $(this).prev().is(':checked');
								}
								c++;
							});
							break;
						case 'radio':
							c = 1;
							$('#' + $(this).attr('id') + ' input[type=text]').each(function () {
								if ($(this).attr('name') === 'title') {
									serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($(this).val());
								}
								else {
									serialStr += opts.prepend + '[' + li_count + '][values][' + c + '][value]=' + encodeURIComponent($(this).val());
									serialStr += opts.prepend + '[' + li_count + '][values][' + c + '][baseline]=' + $(this).prev().is(':checked');
								}
								c++;
							});
							break;
						case 'select':
							c = 1;
							serialStr += opts.prepend + '[' + li_count + '][multiple]=' + $('#' + $(this).attr('id') + ' input[name=multiple]').is(':checked');
							$('#' + $(this).attr('id') + ' input[type=text]').each(function () {
								if ($(this).attr('name') === 'title') {
									serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($(this).val());
								}
								else {
									serialStr += opts.prepend + '[' + li_count + '][values][' + c + '][value]=' + encodeURIComponent($(this).val());
									serialStr += opts.prepend + '[' + li_count + '][values][' + c + '][baseline]=' + $(this).prev().is(':checked');
								}
								c++;
							});
							break;
						case 'data_list':
							c = 1;
							serialStr += opts.prepend + '[' + li_count + '][multiple]=' + $('#' + $(this).attr('id') + ' input[name=multiple]').is(':checked');
							$('#' + $(this).attr('id') + ' input[type=text]').each(function () {
								if ($(this).attr('name') === 'title') {
									serialStr += opts.prepend + '[' + li_count + '][title]=' + encodeURIComponent($(this).val());
								}
								else {
									serialStr += opts.prepend + '[' + li_count + '][values][' + c + '][value]=' + encodeURIComponent($(this).val());
									serialStr += opts.prepend + '[' + li_count + '][values][' + c + '][baseline]=' + $(this).prev().is(':checked');
								}
								c++;
							});
							break;
						}
					}
				}
				li_count++;
				style_pos=li_count;
			});
		});
		
		//For style-representation
		var form_style_value=document.getElementById("form-style").value ;
		var form_color_value=document.getElementById("form-color").value ;
		
		serialStr += opts.prepend + '[' + style_pos + '][style_number]=' +  form_style_value;
		serialStr += opts.prepend + '[' + style_pos + '][color_name]=' +  form_color_value;
		
//		alert(serialStr);
		return (serialStr);
	};
})(jQuery);