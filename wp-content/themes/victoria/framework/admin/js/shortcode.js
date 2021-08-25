	var shortcode = {
		init:function(){
			jQuery('.primary_select select').val('');
			jQuery('.primary_select select').change(function(){
			jQuery(".secondary_select").hide();
				if(this.value !=''){
					if(jQuery("#secondary_"+this.value).show().children('.tertiary_select').size() == 0){
						jQuery("#secondary_"+this.value).show();
					}
				}
			});
			
			jQuery('#sendtoeditor').click(function(){
				shortcode.sendToEditor();
			});
			
			jQuery('.secondaryselect select').val('');
			jQuery('.secondaryselect select').change(function(){
				jQuery(this).closest('.secondary_select').children('.tertiary_select').hide();
				if(this.value !=''){
					jQuery("#atp-"+this.value).show();
				}
			});
		},
		generate:function(){
			var type = jQuery('.primary_select select').val();
			switch(type){
				// C O L U M N   L A Y O U T S 
				//--------------------------------------------------------
				case 'Columns':
						var types =jQuery('[name="Columns_type"]').val();
						if(types != ''){
							var content =jQuery('[name="Columns_content"]').val();
							return '\n['+types+']\n'+content+'\n[/'+types+']\n';
						}else{
							return '';
						}
						break;	
				
				// L A Y O U T S 
				//--------------------------------------------------------
				case 'Layouts':
						var secondary_type =jQuery('#secondary_Layouts select').val();
						switch(secondary_type) {
							//--------------------------------------------------------
							case 'one_half_layout':	
									var one_half_layout =jQuery('[name="Layouts_one_half_layout_layout_1"]').val();
									var one_half_layout_last =jQuery('[name="Layouts_one_half_layout_layout_2"]').val();
									return '[one_half]'+one_half_layout+'[/one_half]\n[one_half_last]'+one_half_layout_last+'[/one_half_last]\n';	
									break;
							//--------------------------------------------------------
							case 'one_third_layout':
									var one_third_layout1 = jQuery('[name="Layouts_one_third_layout_one_third_1"]').val();
									var one_third_layout2 = jQuery('[name="Layouts_one_third_layout_one_third_2"]').val();
									var one_third_layout3 = jQuery('[name="Layouts_one_third_layout_one_third_3"]').val();
									return '[one_third]'+one_third_layout1+'[/one_third]\n[one_third]'+one_third_layout2+'[/one_third]\n[one_third_last]'+one_third_layout3+'[/one_third_last]\n';	
									break;
							//--------------------------------------------------------
							case 'one_fourth_layout':
									var one_fourth_layout1 = jQuery('[name="Layouts_one_fourth_layout_one_fourth_1"]').val();
									var one_fourth_layout2 = jQuery('[name="Layouts_one_fourth_layout_one_fourth_2"]').val();
									var one_fourth_layout3 = jQuery('[name="Layouts_one_fourth_layout_one_fourth_3"]').val();
									var one_fourth_layout4 = jQuery('[name="Layouts_one_fourth_layout_one_fourth_4"]').val();
									return '[one_fourth]'+one_fourth_layout1+'[/one_fourth]\n[one_fourth]'+one_fourth_layout2+'[/one_fourth]\n[one_fourth]'+one_fourth_layout3+'[/one_fourth]\n[one_fourth_last]'+one_fourth_layout4+'[/one_fourth_last]\n';	
									break;
							//--------------------------------------------------------
							case 'one_fifth_layout':					 
									var one5thlayout1 = jQuery('[name="Layouts_one_fifth_layout_one_fifth_1"]').val();
									var one5thlayout2 = jQuery('[name="Layouts_one_fifth_layout_one_fifth_2"]').val();
									var one5thlayout3 = jQuery('[name="Layouts_one_fifth_layout_one_fifth_3"]').val();
									var one5thlayout4 = jQuery('[name="Layouts_one_fifth_layout_one_fifth_4"]').val();
									var one5thlayout5 = jQuery('[name="Layouts_one_fifth_layout_one_fifth_5"]').val();
									return '[one_fifth]'+one5thlayout1+'[/one_fifth]\n[one_fifth]'+one5thlayout2+'[/one_fifth]\n[one_fifth]'+one5thlayout3+'[/one_fifth]\n[one_fifth]'+one5thlayout4+'[/one_fifth]\n[one_fifth_last]'+one5thlayout5+'[/one_fifth_last]\n';
									break;
							//--------------------------------------------------------
							case 'one_sixth_layout':					   
									var one6thlayout1 = jQuery('[name="Layouts_one_sixth_layout_one_sixth_1"]').val();
									var one6thlayout2 = jQuery('[name="Layouts_one_sixth_layout_one_sixth_2"]').val();
									var one6thlayout3 = jQuery('[name="Layouts_one_sixth_layout_one_sixth_3"]').val();
									var one6thlayout4 = jQuery('[name="Layouts_one_sixth_layout_one_sixth_4"]').val();
									var one6thlayout5 = jQuery('[name="Layouts_one_sixth_layout_one_sixth_5"]').val();
									var one6thlayout6 = jQuery('[name="Layouts_one_sixth_layout_one_sixth_6"]').val();
									return '[one_sixth]'+one6thlayout1+'[/one_sixth]\n[one_sixth]'+one6thlayout2+'[/one_sixth]\n[one_sixth]'+one6thlayout3+'[/one_sixth]\n[one_sixth]'+one6thlayout4+'[/one_sixth]\n[one_sixth]'+one6thlayout5+'[/one_sixth]\n[one_sixth_last]'+one6thlayout6+'[/one_sixth_last]\n';
									break;
							//--------------------------------------------------------
							case 'one_3rd_2rd':
									var one3rd2rd_1 = jQuery('[name="Layouts_one_3rd_2rd_one3rd2rd_1"]').val();
									var one3rd2rd_2 = jQuery('[name="Layouts_one_3rd_2rd_one3rd2rd_2"]').val();
									return '[one_third]'+one3rd2rd_1+'[/one_third]\n[two_third_last]'+one3rd2rd_2+'[/two_third_last]\n';	
									break;
							//--------------------------------------------------------
							case 'two_3rd_1rd':
									var two3rd1rd_1 = jQuery('[name="Layouts_two_3rd_1rd_two3rd1rd_1"]').val();
									var two3rd1rd_2 = jQuery('[name="Layouts_two_3rd_1rd_one3rd2rd_2"]').val();
									return '[two_third]'+two3rd1rd_1+'[/two_third]\n[one_third_last]'+two3rd1rd_2+'[/one_third_last]\n';	
									break;
							//--------------------------------------------------------
							case 'One_4th_Three_4th':
									var One4thThree4th_1 = jQuery('[name="Layouts_One_4th_Three_4th_One4thThree4th_1"]').val();
									var One4thThree4th_2 = jQuery('[name="Layouts_One_4th_Three_4th_One4thThree4th_2"]').val();
									return '[one_fourth]'+One4thThree4th_1+'[/one_fourth]\n[three_fourth_last]'+One4thThree4th_2+'[/three_fourth_last]\n';
									break;
							//--------------------------------------------------------
							case 'Three_4th_One_4th':
									var Three4thOne4th_1 = jQuery('[name="Layouts_Three_4th_One_4th_Three4thOne4th_1"]').val();
									var Three4thOne4th_2 = jQuery('[name="Layouts_Three_4th_One_4th_Three4thOne4th_2"]').val();
									return '[three_fourth]'+Three4thOne4th_1+'[/three_fourth]\n[one_fourth_last]'+Three4thOne4th_2+'[/one_fourth_last]\n';	
									break;
							//--------------------------------------------------------
							case 'One_4th_One_4th_One_half':
									var One_4th_One_4th_One_half_1 = jQuery('[name="Layouts_One_4th_One_4th_One_half_One4thOne4thOnehalf_1"]').val();
									var One_4th_One_4th_One_half_2 = jQuery('[name="Layouts_One_4th_One_4th_One_half_One4thOne4thOnehalf_2"]').val();
									var One_4th_One_4th_One_half_3 = jQuery('[name="Layouts_One_4th_One_4th_One_half_One4thOne4thOnehalf_3"]').val();
									return '[one_fourth]'+One_4th_One_4th_One_half_1+'[/one_fourth]\n[one_fourth]'+One_4th_One_4th_One_half_2+'[/one_fourth]\n[one_half_last]'+One_4th_One_4th_One_half_3+'[/one_half_last]\n';
									break;
							//--------------------------------------------------------
							case 'One_half_One_4th_One_4th':
									var OnehalfOne4thOne4th_1 = jQuery('[name="Layouts_One_half_One_4th_One_4th_OnehalfOne4thOne4th_1"]').val();
									var OnehalfOne4thOne4th_2 = jQuery('[name="Layouts_One_half_One_4th_One_4th_OnehalfOne4thOne4th_2"]').val();
									var OnehalfOne4thOne4th_3 = jQuery('[name="Layouts_One_half_One_4th_One_4th_OnehalfOne4thOne4th_3"]').val();
									return '[one_half]'+OnehalfOne4thOne4th_1+'[/one_half]\n[one_fourth]'+OnehalfOne4thOne4th_2+'[/one_fourth]\n[one_fourth_last]'+OnehalfOne4thOne4th_3+'[/one_fourth_last]\n';
									break;
							//--------------------------------------------------------		
							case 'One_4th_One_half_One_4th':
									var One4thOnehalfOne4th_1 = jQuery('[name="Layouts_One_4th_One_half_One_4th_One4thOnehalfOne4th_1"]').val();
									var One4thOnehalfOne4th_2 = jQuery('[name="Layouts_One_4th_One_half_One_4th_One4thOnehalfOne4th_2"]').val();
									var One4thOnehalfOne4th_3 = jQuery('[name="Layouts_One_4th_One_half_One_4th_One4thOnehalfOne4th_3"]').val();
									return '[one_fourth]'+One4thOnehalfOne4th_1+'[/one_fourth]\n[one_half]'+One4thOnehalfOne4th_2+'[/one_half]\n[one_fourth_last]'+One4thOnehalfOne4th_3+'[/one_fourth_last]\n';
									break;
							//--------------------------------------------------------
							case 'One_5th_Four_5th':
									var One5thFour5th_1 = jQuery('[name="Layouts_One_5th_Four_5th_One5thFour5th_1"]').val();
									var One5thFour5th_2 = jQuery('[name="Layouts_One_5th_Four_5th_One5thFour5th_2"]').val();
									return '[one_fifth]'+One5thFour5th_1+'[/one_fifth]\n[four_fifth_last]'+One5thFour5th_2+'[/four_fifth_last]\n';
									break;
							//--------------------------------------------------------
							case 'Four_5th_One_5th':
									var Four5thOne5th_1 = jQuery('[name="Layouts_Four_5th_One_5th_Four5thOne5th_1"]').val();
									var Four5thOne5th_2 = jQuery('[name="Layouts_Four_5th_One_5th_Four5thOne5th_2"]').val();
									return '[four_fifth]'+Four5thOne5th_1+'[/four_fifth]\n[one_fifth_last]'+Four5thOne5th_2+'[/one_fifth_last]\n';
									break;
							//--------------------------------------------------------
							case 'Two_5th_Three_5th':
									var Two5thThree5th_1 = jQuery('[name="Layouts_Two_5th_Three_5th_Two5thThree5th_1"]').val();
									var Two5thThree5th_2 = jQuery('[name="Layouts_Two_5th_Three_5th_Two5thThree5th_2"]').val();
									return '[two_fifth]'+Two5thThree5th_1+'[/two_fifth]\n[three_fifth_last]'+Two5thThree5th_2+'[/three_fifth_last]\n';
									break;
							//--------------------------------------------------------
							case 'Three_5th_Two_5th':
									var Three5thTwo5th_1 = jQuery('[name="Layouts_Three_5th_Two_5th_Three5thTwo5th_1"]').val();
									var Three5thTwo5th_2 = jQuery('[name="Layouts_Three_5th_Two_5th_Three5thTwo5th_2"]').val();
									return '[three_fifth]'+Three5thTwo5th_1+'[/three_fifth]\n[two_fifth_last]'+Three5thTwo5th_2+'[/two_fifth_last]\n';	
									break;
						}
						break;

				// Boxes
				//--------------------------------------------------------
				case 'Boxes':
						var shortcodesub_type =jQuery('#secondary_Boxes select').val();
						switch(shortcodesub_type) {
							// FancyBox
							//--------------------------------------------------------
							case 'fancybox':
									var title = jQuery('[name="Boxes_fancybox_title"]').val();
									var titlebgcolor = jQuery('[name="Boxes_fancybox_bgcolor"]').val();
									var titlecolor = jQuery('[name="Boxes_fancybox_titlecolor"]').val();
									var ribbon = jQuery('[name="Boxes_fancybox_ribbon"]').val();
									var text = jQuery('[name="Boxes_fancybox_text"]').val();
									var boxbgcolor = jQuery('[name="Boxes_fancybox_boxbgcolor"]').val();
									var textcolor = jQuery('[name="Boxes_fancybox_textcolor"]').val();
									var bordercolor = jQuery('[name="Boxes_fancybox_bordercolor"]').val();
									if(text !== '')	{ text = ''+text+'';}
									if(title !== '')		{ title= ' title="'+title+'"';}
									if(titlebgcolor !== '')		{ titlebgcolor= ' titlebgcolor="'+titlebgcolor+'"'; }
									if(titlecolor !== '')	{ titlecolor= ' titlecolor="'+titlecolor+'"';}
									if(ribbon !== '')		{ ribbon= ' ribbon="'+ribbon+'"';}
									if(boxbgcolor !== '')	{ boxbgcolor= ' boxbgcolor="'+boxbgcolor+'"'; }
									if(textcolor !== '')	{ textcolor= ' textcolor="'+textcolor+'"'; }
									if(bordercolor !== '')	{ bordercolor= ' bordercolor="'+bordercolor+'"'; }
									return '\n[fancy_box'+title+titlebgcolor+titlecolor+boxbgcolor+bordercolor+textcolor+ribbon+']'+ text +'[/fancy_box]\n';
									break;
							// Minimal Box
							//--------------------------------------------------------
							case 'minimalbox':
									var title = jQuery('[name="Boxes_minimalbox_title"]').val();
									var titlebgcolor = jQuery('[name="Boxes_minimalbox_titlebgcolor"]').val();
									var titlecolor = jQuery('[name="Boxes_minimalbox_titlecolor"]').val();
									var ribbon = jQuery('[name="Boxes_minimalbox_ribbon"]').val();
									var text = jQuery('[name="Boxes_minimalbox_text"]').val();
									if(text !== '')	{ text = ''+text+'';}
									if(title !== '')		{ title= ' title="'+title+'"';}
									if(titlecolor !== '')	{ titlecolor= ' titlecolor="'+titlecolor+'"';}
									if(titlebgcolor !== '')	{ titlebgcolor= ' titlebgcolor="'+titlebgcolor+'"';}
									if(ribbon !== '')		{ ribbon= ' ribbon="'+ribbon+'"';}
									return '\n[minimal_box'+title+titlebgcolor+titlecolor+ribbon+']'+ text +'[/minimal_box]\n';
									break;
							// Framed Box
							//--------------------------------------------------------
							case 'framedbox':
									var bgcolor = jQuery('[name="Boxes_framedbox_bgcolor"]').val();
									var bordercolor = jQuery('[name="Boxes_framedbox_bordercolor"]').val();
									var padding = jQuery('[name="Boxes_framedbox_padding"]').val();
									var ribbon = jQuery('[name="Boxes_framedbox_ribbon"]').val();
									var text = jQuery('[name="Boxes_framedbox_text"]').val();
									var width = jQuery('[name="Boxes_framedbox_width"]').val();
									var height = jQuery('[name="Boxes_framedbox_height"]').val();
									if(text !== '')	{ text = ''+text+'';}
									if(bgcolor !== '')	{ bgcolor= ' bgcolor="'+bgcolor+'"';}
									if(bordercolor !== '')	{ bordercolor= ' bordercolor="'+bordercolor+'"';}
									if(padding !== '')	{ padding= ' padding="'+padding+'"';}
									if(ribbon !== '')		{ ribbon= ' ribbon="'+ribbon+'"';}
									if(width!='')		{ width =' width="'+width+'"'; }
									if(height!='')		{ height =' height="'+height+'"';}
									return '\n[framed_box'+bgcolor+bordercolor+ribbon+width+height+']'+ text +'[/framed_box]\n';
									break;

							// Message Box
							//--------------------------------------------------------
							case 'messagebox':
									var msgtype =  jQuery('[name="Boxes_messagebox_msgtype"]').val();
									var text =  jQuery('[name="Boxes_messagebox_text"]').val();
									if(text !== '')	{ text = ''+text+'';}
									if(msgtype == '')		{ msgtype='info'; }
									
									return '\n['+msgtype+']'+ text +'[/'+msgtype+']\n';
									break;
							// N O T E   B O X 
							//--------------------------------------------------------
							case 'notebox':
									var align = jQuery('[name="Boxes_notebox_align"]').val();
									var width = jQuery('[name="Boxes_notebox_width"]').val();
									var title = jQuery('[name="Boxes_notebox_title"]').val();
									var text = jQuery('[name="Boxes_notebox_text"]').val();
									if(text !== '')	{ text = ''+text+'';}
									if(align !== '')	{align= ' align="'+align+'"';}
									if(width !== '')	{width= ' width="'+width+'"';}
									if(title !== '')	{title= ' title="'+title+'"';}
									return '\n[note'+align+width+title+']'+ text +'[/note]\n';
									break;
						}
						break;
				// T Y P O G R A P H Y 
				//--------------------------------------------------------
				case 'Typography':
						var shortcodesub_type =jQuery('#secondary_Typography select').val();
						switch(shortcodesub_type) {
							// D R O P C A P 
							//--------------------------------------------------------
							case 'dropcap1':
									var text = jQuery('[name="Typography_dropcap1_dropcap_text"]').val();
									var color = jQuery('[name="Typography_dropcap1_color"]').val();
									if(color !== '')	{color = ' color="'+color+'"';}
									return '['+shortcodesub_type+color+']'+text+'[/'+shortcodesub_type+']';
									break;
							// D R O P C A P   2
							//--------------------------------------------------------
							case 'dropcap2':
									var text = jQuery('[name="Typography_dropcap2_dropcap_text"]').val();
									var bgcolor = jQuery('[name="Typography_dropcap2_bgcolor"]').val();
									if(bgcolor !== '')	{bgcolor = ' bgcolor="'+bgcolor+'"';}
									return '['+shortcodesub_type+bgcolor+']'+text+'[/'+shortcodesub_type+']';
									break;
							// D R O P C A P   3
							//--------------------------------------------------------
							case 'dropcap3':
									var text = jQuery('[name="Typography_dropcap3_dropcap_text"]').val();
									var color = jQuery('[name="Typography_dropcap3_color"]').val();
									if(color !== '')	{color = ' color="'+color+'"';}
									return '['+shortcodesub_type+color+']'+text+'[/'+shortcodesub_type+']';
									break;
							
							// H I G H L I G H T 
							//--------------------------------------------------------
							case 'highlight':
									var textcolor = jQuery('[name="Typography_highlight_textcolor"]').val();
									var bgcolor = jQuery('[name="Typography_highlight_bgcolor"]').val();
									var text = jQuery('[name="Typography_highlight_text"]').val();
									if(text !== '')	{ text = ''+text+'';}
									if(bgcolor !== '')	{ bgcolor= ' bgcolor="'+bgcolor+'"';}
									if(textcolor !== ''){ textcolor = ' textcolor="'+textcolor+'"';}
									return '\n[highlight'+bgcolor+textcolor+']'+ text +'[/highlight]\n';
									break;
							// F A N C Y   H E A D I N G 
							//--------------------------------------------------------
							case 'fancyheading':
									var textcolor = jQuery('[name="Typography_fancyheading_textcolor"]').val();
									var bgcolor = jQuery('[name="Typography_fancyheading_bgcolor"]').val();
									var text = jQuery('[name="Typography_fancyheading_text"]').val();
									if(text !== '')	{ text = ''+text+'';}
									if(bgcolor !== '')	{ bgcolor= ' bgcolor="'+bgcolor+'"';}
									if(textcolor !== ''){ textcolor = ' textcolor="'+textcolor+'"';}
									return '\n[fancyheading'+bgcolor+textcolor+']'+ text +'[/fancyheading]\n';
									break;
							// B L O C K Q U O T E 
							//--------------------------------------------------------
							case 'blockquote':
								var align = jQuery('[name="Typography_blockquote_align"]').val();
								var cite = jQuery('[name="Typography_blockquote_cite"]').val();
								var citelink = jQuery('[name="Typography_blockquote_citelink"]').val();
								var content = jQuery('[name="Typography_blockquote_content"]').val();
								var width = jQuery('[name="Typography_blockquote_width"]').val();
								if(content !== '')	{ content = ''+content+'';}
								if(align !== '')	{ align = ' align="'+align+'"';}
								if(cite !== '')		{ cite = ' cite="'+cite+'"';}
								if(citelink !== '')	{ citelink = ' citelink="'+citelink+'"';}
								if(width !== '')	{ width = ' width="'+width+'"';}
								return '[blockquote'+align+width+cite+citelink+']'+content+'[/blockquote]\n';
								break;
								 
							// S T Y L E D   L I S T S 
							//--------------------------------------------------------
							case 'styledlist':
									var style = jQuery('[name="Typography_styledlist_style"]').val();
									var color = jQuery('[name="Typography_styledlist_color"]').val();
									var content = jQuery('[name="Typography_styledlist_content"]').val();
									if(content !== '')	{ content = ''+content+'';}
									if(style !== '')	{ style= ' style="'+style+'"';}
									if(color !== '')	{ color = ' color="'+color+'"';}
									return '\n[list'+style+color+']\n'+ content +'\n[/list]\n';
									break;
									
							// I C O N S 
							//--------------------------------------------------------
							case 'icon':
									var text = jQuery('[name="Typography_icon_text"]').val();
									var style = jQuery('[name="Typography_icon_style"]').val();
									var color = jQuery('[name="Typography_icon_color"]').val();
									if(text !== '')	{ text = ''+text+'';}
									if(style !== '')	{ style= ' style="'+style+'"';}
									if(color !== '')	{ color = ' color="'+color+'"';	}
									return '\n[icon'+style+color+']'+ text +'[/icon]\n';
									break;
									
							// I C O N   L I N K S
							//--------------------------------------------------------
							case 'iconlinks':
									var style = jQuery('[name="Typography_iconlinks_style"]').val();
									var color = jQuery('[name="Typography_iconlinks_color"]').val();
									var href = jQuery('[name="Typography_iconlinks_href"]').val();
									var target = jQuery('[name="Typography_iconlinks_target"]').val();
									var text = jQuery('[name="Typography_iconlinks_text"]').val();
									if(text !== '')	{ text = ''+text+'';}
									if(style !== '')	{ style= ' style="'+style+'"'; }
									if(color !== '')	{ color = ' color="'+color+'"'; }
									if(href !== '')		{ href = ' href="'+href+'"'; }
									if(target !== '')	{ target = ' target="'+target+'"';}
									return '\n[icon'+style+color+href+target+']'+ text +'[/icon]\n';
									break;
						}
					break;
				
				
				// B U T T O N  
				//--------------------------------------------------------
				case 'Button':
						var id = jQuery('[name="Button_id"]').val();
						var bclass = jQuery('[name="Button_class"]').val();
						var link = jQuery('[name="Button_link"]').val();
						var linktarget =  jQuery('[name="Button_linktarget"]').val();
						var color =  jQuery('[name="Button_color"]').val();
						var align =  jQuery('[name="Button_align"]').val();
						var bgcolor =  jQuery('[name="Button_bgcolor"]').val();
						var hoverbgcolor =  jQuery('[name="Button_hoverbgcolor"]').val();
						var hovertextcolor =  jQuery('[name="Button_hovertextcolor"]').val();
						var textcolor =  jQuery('[name="Button_textcolor"]').val();
						var size =  jQuery('[name="Button_size"]').val();
						var width =  jQuery('[name="Button_width"]').val();
						var fullwidth =  jQuery('[name="Button_style"]');
						if(fullwidth.is('.atp-button')){
							if(fullwidth.is(':checked')){
								fullwidth= ' fullwidth="true"';	
							}else{
								fullwidth= ' fullwidth="false"';		
							}
						}
			
						var text = jQuery('[name="Button_text"]').val();
						if(text !== '')	{ text = ''+text+'';}
						if(id !== '')			{ id= ' id="'+id+'"'; }
						if(bclass !== '')		{ bclass= ' class="'+bclass+'"'; }
						if(link !== '')			{ link= ' link="'+link+'"'; }
						if(linktarget !== '')	{ linktarget= ' linktarget="'+linktarget+'"'; }
						if(color !== '')		{ color= ' color="'+color+'"';}
						if(align !== '')		{ align= ' align="'+align+'"';}
						if(bgcolor !== '')		{ bgcolor= ' bgcolor="'+bgcolor+'"';}
						if(hoverbgcolor !== '')	{ hoverbgcolor= ' hoverbgcolor="'+hoverbgcolor+'"';	}
						if(hovertextcolor !== ''){ hovertextcolor= ' hovertextcolor="'+hovertextcolor+'"';}
						if(textcolor !== '')	{ textcolor= ' textcolor="'+textcolor+'"';}
						if(size !== '')			{ size= ' size="'+size+'"';}
						if(width !== '')		{ width= ' width="'+width+'"';}	
						return '\n[button'+id+bclass+link+linktarget+color+align+bgcolor+hoverbgcolor+hovertextcolor+textcolor+size+width+fullwidth+']'+ text +'[/button]\n';
						break;
				// Dividers
				//--------------------------------------------------------
				case 'divider':
						var shortcodesub_type =jQuery('#secondary_divider select').val();
						if(shortcodesub_type== 'divider_top')	{
							var title = jQuery('[name="divider_divider_top_text"]').val();
							return '\n[divider_top]'+title+'[/divider_top]\n';
						}else{
							return '\n['+jQuery('#secondary_divider select').val()+']\n';
						}
						break;
				// T A B L E 
				//--------------------------------------------------------
				case 'Table':
						var width =  jQuery('[name="Table_width"]').val();
						var align =  jQuery('[name="Table_align"]').val();
						var text = jQuery('[name="Table_text"]').val();
						if(text !== '')	{ text = ''+text+'';}
						if(width !== '')	{ width= ' width="'+width+'"';}
						if(align !== '')	{ align= ' align="'+align+'"';}
						return '\n[fancytable'+align+width+']'+ text +'[/fancytable]\n';
						break;
				// T O G G L E 
				//--------------------------------------------------------
				case 'Toggle':
						var heading =  jQuery('[name="Toggle_heading"]').val();
						var text = jQuery('[name="Toggle_text"]').val();
						if(text !== '')	{ text = ''+text+'';}
						if(heading !== '')	{ heading= ' heading="'+heading+'"';}
						return '\n[toggle'+heading+']\n'+ text+'\n[/toggle]\n';
						break;
				// F A N C Y   T O G G L E 
				//--------------------------------------------------------
				case 'FancyToggle':
						var heading = jQuery('[name="FancyToggle_heading"]').val();
						var text = jQuery('[name="FancyToggle_text"]').val();
						if(text !== '')	{ text = ''+text+'';}
						if(heading !== '')	{ heading= ' heading="'+heading+'"';}
						return '\n[fancytoggle'+heading+']\n'+ text+'\n[/fancytoggle]\n';
						break;
				
				// T A B S 
				//--------------------------------------------------------
				case 'Tabs':
						var shortcodesub_tabs=jQuery('#secondary_Tabs select').val();
						for(var i=1;i<=shortcodesub_tabs;i++){
							var stabstype =jQuery('[name="Tabs_'+shortcodesub_tabs+'_ctabs'+'"]').val();
							var stabsposition =jQuery('[name="Tabs_'+shortcodesub_tabs+'_tposition'+'"]').val();
						} 
						var outputs = '[minitabs tabtype="'+stabstype+'"]';
						for(var i=1;i<=shortcodesub_tabs;i++){
							var title =jQuery('[name="Tabs_'+shortcodesub_tabs+'_title_'+i+'"]').val();
							var bgcolor =jQuery('[name="Tabs_'+shortcodesub_tabs+'_titlebgcolor_'+i+'"]').val();
							var color =jQuery('[name="Tabs_'+shortcodesub_tabs+'_titlecolor_'+i+'"]').val();
							var content =jQuery('[name="Tabs_'+shortcodesub_tabs+'_text_'+i+'"]').val();
							var stabstype =jQuery('[name="Tabs_'+shortcodesub_tabs+'_ctabs'+'"]').val();
							if(title !== '')	{title= ' title="'+title+'"';}
							if(bgcolor !== '')	{bgcolor= ' tabcolor="'+bgcolor+'"';}
							if(color !== '')	{color= ' textcolor="'+color+'"';}
							if(content !== '')	{ content = ''+content+'';}
							outputs +='[tab'+title+color+bgcolor+']\n'+content+'\n[/tab]\n';
						}
						outputs +='[/minitabs]';
						return outputs;
						break;
				// 	P R I C I N G T A B L E
				//--------------------------------------------------------
				case 'pricing':
						var shortcodesub_pricing=jQuery('#secondary_pricing select').val();
						var shortcodesub_pricing=jQuery('#secondary_pricing select').val();
						var outputs ='[pricingcolumns]';
						for(var i=1;i<=shortcodesub_pricing;i++){	
							var shortcodesub_title =jQuery('[name="pricing_'+shortcodesub_pricing+'_title_'+i+'"]').val();
							var shortcodesubheading =jQuery('[name="pricing_'+shortcodesub_pricing+'_heading_'+i+'"]').val();
							var shortcodesub_content =jQuery('[name="pricing_'+shortcodesub_pricing+'_desc_'+i+'"]').val();
							var shortcodesub_bgcolor =jQuery('[name="pricing_'+shortcodesub_pricing+'_bgcolor_'+i+'"]').val();
							var shortcodesub_color =jQuery('[name="pricing_'+shortcodesub_pricing+'_color_'+i+'"]').val();
							
							if(shortcodesub_title!="")			{ title = ' title="'+shortcodesub_title+'"';}else{title	 = '';}
							if(shortcodesub_bgcolor!="")			{ headingbgcolor = ' headingbgcolor="'+shortcodesub_bgcolor+'"';}else{headingbgcolor	 = '';}
							if(shortcodesub_color!="")			{ headingcolor = ' headingcolor="'+shortcodesub_color+'"';}else{headingcolor	 = '';}
							if(shortcodesubheading!="")			{ heading = ' heading="'+shortcodesubheading+'"';}else{heading	 = '';}
			
							outputs +='[col'+title+headingbgcolor+headingcolor+heading+']\n'+shortcodesub_content+'\n[/col]\n';
						}
						outputs +='[/pricingcolumns]';
						return  outputs;
						break;
				// F L E X   S L I D E R 
				//--------------------------------------------------------
				case 'flexslider':
						var shortcodesub_slider=jQuery('#secondary_flexslider select').val();
				
						switch(shortcodesub_slider){
							// P O S T  
							//--------------------------------------------------------
							case 'post':
									var effect = jQuery('[name="flexslider_post_flexeffect"]').val();
									var cat = jQuery('[name="flexslider_post_flexcats[]"]').val();
									var speed = jQuery('[name="flexslider_post_flexanimspeed"]').val();
									var limits = jQuery('[name="flexslider_post_flexslidelimit"]').val();
									var width = jQuery('[name="flexslider_post_width"]').val();
									var height = jQuery('[name="flexslider_post_height"]').val();
									var navigation =  jQuery('[name="flexslider_post_navigation"]');
									if(navigation.is('.atp-button')){
										if(navigation.is(':checked')){
											navigation= ' navigation="true"';	
										}else{
											navigation= ' navigation="false"';		
										}
									}
									if(effect!="")			{ effect = ' effect="'+effect+'"';}else{effect	 = '';}
									if(cat!="")				{ cat = ' cat="'+cat+'"';}else{cat	 = '';}
									if(speed!="")			{ speed = ' speed="'+speed+'"';}else{speed	 = '';}
									if(limits!="")			{ limits = ' limits="'+limits+'"';}else{limits	 = '';}
									if(width!="")			{ width = ' width="'+width+'"';}else{width	 = '';}
									if(height!="")			{ height = ' height="'+height+'"';}else{height	 = '';}

									return '\n[slider'+effect+cat+speed+limits+width+height+navigation+']\n';	
									break;
							// S L I D E R 
							//--------------------------------------------------------
							case 'slider':
									var effect = jQuery('[name="flexslider_slider_flexeffect"]').val();					
									var speed = jQuery('[name="flexslider_slider_flexanimspeed"]').val();
									var limits = jQuery('[name="flexslider_slider_flexslidelimit"]').val();
									var width = jQuery('[name="flexslider_slider_width"]').val();
									var height = jQuery('[name="flexslider_slider_height"]').val();
									var navigation =  jQuery('[name="flexslider_slider_navigation"]');
									if(navigation.is('.atp-button')){
										if(navigation.is(':checked')){
											navigation= ' navigation="true"';	
										}else{
											navigation= ' navigation="false"';		
										}
									}
									if(effect!="")			{ effect = ' effect="'+effect+'"';}else{effect	 = '';}
									if(cat!="")				{ cat = ' cat="'+cat+'"';}else{cat	 = '';}
									if(speed!="")			{ speed = ' speed="'+speed+'"';}else{speed	 = '';}
									if(limits!="")			{ limits = ' limits="'+limits+'"';}else{limits	 = '';}
									if(width!="")			{ width = ' width="'+width+'"';}else{width	 = '';}
									if(height!="")			{ height = ' height="'+height+'"';}else{height	 = '';}
									return '\n[slider'+effect+speed+limits+width+height+navigation+']\n';		
									break;
							// A T T A C H M E N T 
							//--------------------------------------------------------
							case 'postattachment':
									var effect = jQuery('[name="flexslider_postattachment_flexeffect"]').val();					
									var speed = jQuery('[name="flexslider_postattachment_flexanimspeed"]').val();
									var limits = jQuery('[name="flexslider_postattachment_flexslidelimit"]').val();
									var width = jQuery('[name="flexslider_postattachment_width"]').val();
									var height = jQuery('[name="flexslider_postattachment_height"]').val();
									var navigation =  jQuery('[name="flexslider_postattachment_navigation"]');
									if(navigation.is('.atp-button')){
										if(navigation.is(':checked')){
											navigation= ' navigation="true"';	
										}else{
											navigation= ' navigation="false"';		
										}
									}
									if(effect!="")			{ effect = ' effect="'+effect+'"';}else{effect	 = '';}
									if(speed!="")			{ speed = ' speed="'+speed+'"';}else{speed	 = '';}
									if(limits!="")			{ limits = ' limits="'+limits+'"';}else{limits	 = '';}
									if(width!="")			{ width = ' width="'+width+'"';}else{width	 = '';}
									if(height!="")			{ height = ' height="'+height+'"';}else{height	 = '';}
									return '\n[postslider'+effect+speed+limits+width+height+navigation+']\n';		
									break;
						}
						break;	
				// M I N I   G A L L E R Y 
				//--------------------------------------------------------
				case 'minigallery':
						var width = jQuery('[name="minigallery_width"]').val();
						var height = jQuery('[name="minigallery_height"]').val();
						var imageclass = jQuery('[name="minigallery_class"]').val();
						var minigallery_textareaurl = jQuery('[name="minigallery_textarea_url"]').val();
						if(minigallery_textareaurl !="") {content = ''+minigallery_textareaurl+'';}
						if(width!='')	{ width	=' width="'+width+'"';}else{ width=' width="200"';}
						if(height!='')	{ height =' height="'+height+'"';}else{ height=' height="200"';}
						if(imageclass!='')	{ imageclass =' class="'+imageclass+'"';	}		
						return '\n[minigallery'+imageclass+width+height+']'+ content+'[/minigallery]\n';;	
						break;
				// I M A G E 
 				case 'image':
						var title = jQuery('[name="image_title"]').val();
						var caption = jQuery('[name="image_caption"]').val();
						var lightbox = jQuery('[name="image_lightbox"]');
						var width = jQuery('[name="image_width"]').val();
						var height = jQuery('[name="image_height"]').val();
						var align = jQuery('[name="image_align"]').val();
						var alink = jQuery('[name="image_alink"]').val();
						var target = jQuery('[name="image_target"]').val();
						var imagesrc = jQuery('[name="image_imagesrc"]').val();
						if(imagesrc!='')	{ imagesrc	=' src="'+imagesrc+'"';}
						if(width!='')	{ width	=' width="'+width+'"';}else{ width=' width="200"';}
						if(height!='')	{ height =' height="'+height+'"';}else{ height=' height="200"';}
						if(title!='')	{ title =' title="'+title+'"'; }
						if(caption!='')	{ caption =' caption="'+caption+'"'; }
						if(alink!='')	{ alink	=' link="'+alink+'"';}
						if(target!='')	{ target	=' target="'+target+'"';}
						if(align!='')	{ align =' align="'+align+'"';	}
						if(lightbox.is('.atp-button')){
							if(lightbox.is(':checked')){
								lightbox= ' lightbox="true"';	
							}else{
								lightbox= ' lightbox="false"';		
							}
						}		
						return '\n[image'+width+height+title+caption+lightbox+align+alink+target+imagesrc+']\n';		
						break;
				// P H O T O F R A M E 
				case 'photoframe':
						var imagesrc = jQuery('[name="photoframe_imagesrc"]').val();
						var alt = jQuery('[name="photoframe_alt"]').val();
						var width = jQuery('[name="photoframe_width"]').val();
						var height = jQuery('[name="photoframe_height"]').val();
						if(imagesrc!='')	{imagesrc =' src="'+imagesrc+'"';}
						if(width!='')		{width =' width="'+width+'"';}
						if(height!='')		{height =' height="'+height+'"';}
						if(alt!='')			{alt =' alt="'+alt+'"';	}
						if(alink!='')		{link =' link="'+alink+'"';}
						return '\n[photoframe'+imagesrc+width+height+alt+']\n';
						break;
				// G A L L E R I A 
				case 'galleria':
						var shortcodesub_galleria=jQuery('#secondary_galleria select').val();

						switch(shortcodesub_galleria){
							// A T T A C H M E N T 
							//--------------------------------------------------------
							case'attachment':
									var galleria_width = jQuery('[name="galleria_attachment_width"]').val();
									var galleria_height = jQuery('[name="galleria_attachment_height"]').val();
									var galleria_transition = jQuery('[name="galleria_attachment_transition"]').val();
									var galleria_autoplay = jQuery('[name="galleria_attachment_autoplay"]').val();
									if(galleria_width !="") { width = ' width="'+galleria_width+'"';}else{width = ' width="500"';}
									if(galleria_height !="") { height = ' height="'+galleria_height+'"';}else{height = ' height="500"';}
									if(galleria_transition !="") { transition = ' transition="'+galleria_transition+'"';}else{transition = ' transition="500"';}
									if(galleria_autoplay !="") { autoplay = ' autoplay="'+galleria_autoplay+'"';}else{autoplay = ' autoplay="500"';}
									return '\n[galleria'+width+height+transition+autoplay+']\n';
									break;
							// G A L L E R I A   U R L 
							//--------------------------------------------------------
							case'galleriaurl':
									var galleria_width = jQuery('[name="galleria_galleriaurl_width"]').val();
									var galleria_height = jQuery('[name="galleria_galleriaurl_height"]').val();
									var galleria_transition = jQuery('[name="galleria_galleriaurl_transition"]').val();
									var galleria_textareaurl = jQuery('[name="galleria_galleriaurl_textarea_url"]').val();
									var galleria_autoplay = jQuery('[name="galleria_galleriaurl_autoplay"]').val();
									if(galleria_width !="") { width = ' width="'+galleria_width+'"';}else{width = ' width="500"';}
									if(galleria_textareaurl !="") {content = ''+galleria_textareaurl+'';}
									if(galleria_height !="") { height = ' height="'+galleria_height+'"';}else{height = ' height="500"';}
									if(galleria_transition !="") { transition = ' transition="'+galleria_transition+'"';}else{transition = ' transition="500"';}
									if(galleria_autoplay !="") { autoplay = ' autoplay="'+galleria_autoplay+'"';}else{autoplay = ' autoplay="500"';}
									return '\n[galleriaurl'+width+height+transition+autoplay+']'+ galleria_textareaurl+'[/galleriaurl]\n';;
									break;
						}
						break;
				// W I D G E T S 
				//--------------------------------------------------------
				case 'widgets':
						var shortcodesub_widgets=jQuery('#secondary_widgets select').val();
						
						switch(shortcodesub_widgets){
							// C O N T A C T   F O R M 
							//--------------------------------------------------------
							case 'Contactform':
									var emailid =  jQuery('[name="widgets_Contactform_emailid"]').val();
									var successmessage =  jQuery('[name="widgets_Contactform_successmessage"]').val();
									if(emailid!=''){ emailid =' emailid="'+emailid+'"'; }
									if(successmessage!=''){ successmessage =' successmessage="'+successmessage+'"'; }
									return '\n[contactform'+emailid+successmessage+']\n';	
									break;
							// T W I T T E R
							//--------------------------------------------------------
							case 'twitter':
									var username =  jQuery('[name="widgets_twitter_username"]').val();
									var limit =  jQuery('[name="widgets_twitter_limit"]').val();
									var consumerkey =  jQuery('[name="widgets_twitter_consumerkey"]').val();
									var consumersecret =  jQuery('[name="widgets_twitter_consumersecret"]').val();
									var accesstoken =  jQuery('[name="widgets_twitter_accesstoken"]').val();
									var accesstokensecret =  jQuery('[name="widgets_twitter_accesstokensecret"]').val();
									if(username !='')	{ username=' username="'+username+'"';	}
									if(consumerkey!='')		{ consumerkey =' consumerkey="'+consumerkey+'"'; }
									if(consumersecret!='')		{ consumersecret =' consumersecret="'+consumersecret+'"'; }
									if(accesstoken!='')		{ accesstoken =' accesstoken="'+accesstoken+'"'; }
									if(accesstokensecret!='')		{ accesstokensecret =' accesstokensecret="'+accesstokensecret+'"'; }
									if(limit!='')		{ limit =' limit="'+limit+'"'; }
									return '\n[twitter'+username+limit+consumerkey+consumersecret+accesstoken+accesstokensecret+']\n';
									
									break;
							// F L I C K R 
							//--------------------------------------------------------
							case 'flickr':
									var id = jQuery('[name="widgets_flickr_id"]').val();
									var limit = jQuery('[name="widgets_flickr_limit"]').val();
									var type = jQuery('[name="widgets_flickr_type"]').val();
									var display = jQuery('[name="widgets_flickr_display"]').val();
									if(id!='')		{ id =' id="'+id+'"'; }
									if(limit!='')	{ limit =' limit="'+limit+'"';	}
									if(type!='')	{ type =' type="'+type+'"';	}
									if(display!='')	{ display =' display="'+display+'"';	}
									return '\n[flickr'+id+limit+display+type+']\n';
									break;
							// P O P U L A R   P O S T S 
							//--------------------------------------------------------
							case 'popularposts':
									var thumb = jQuery('[name="widgets_popularposts_thumb"]');
									var limit = jQuery('[name="widgets_popularposts_limit"]').val();
									if(thumb.is('.atp-button')){
										if(thumb.is(':checked')){
											thumb= ' thumb="true"';	
										}else{
											thumb= ' thumb="false"';		
										}
									}	
									if(limit!='')		{ limit =' limit="'+limit+'"';	}
									return '\n[popularpost '+thumb+limit+']\n';
									break;
							// R E C E N T   P O S T S 
							//--------------------------------------------------------
							case 'recentposts':
									var thumb = jQuery('[name="widgets_recentposts_thumb"]');
									var limit = jQuery('[name="widgets_recentposts_limit"]').val();
									var cat_id = jQuery('[name="widgets_recentposts_cat_id[]"]').val();
									if(thumb.is('.atp-button')){
										if(thumb.is(':checked')){
											thumb= ' thumb="true"';	
										}else{
											thumb= ' thumb="false"';		
										}
									}	
									if(limit!='')		{ limit =' limit="'+limit+'"';}
									if(cat_id!='')		{ cat_id =' cat_id="'+cat_id+'"';}
									return '\n[recentpost '+thumb+limit+cat_id+']\n';
									break;
									
							// C O N T A C T   I N F O 
							//--------------------------------------------------------
							case 'contactinfo':
									var name = jQuery('[name="widgets_contactinfo_name"]').val();
									var address = jQuery('[name="widgets_contactinfo_address"]').val();
									var state = jQuery('[name="widgets_contactinfo_state"]').val();
									var city = jQuery('[name="widgets_contactinfo_city"]').val();
									var zip = jQuery('[name="widgets_contactinfo_zip"]').val();
									var email = jQuery('[name="widgets_contactinfo_email"]').val();
									var phone = jQuery('[name="widgets_contactinfo_phone"]').val();
									var mobile = jQuery('[name="widgets_contactinfo_mobile"]').val();
									//var link = jQuery('[name="widgets_contactinfo_link"]').val();
									var website = jQuery('[name="widgets_contactinfo_website"]').val();
									if(name!='')	{ name =' name="'+name+'"';}
									if(address!='')	{ address =' address="'+address+'"';}
									if(city!='')	{ city =' city="'+city+'"';}
									if(zip!='')		{ zip =' zip="'+zip+'"';}
									if(state!='')	{ state =' state="'+state+'"';}
									if(email!='')	{ email =' email="'+email+'"';}
									if(phone!='')	{ phone =' phone="'+phone+'"';}
									if(mobile!='')	{ mobile =' mobile="'+mobile+'"';}
									//if(link!='')	{ link =' link="'+link+'"';}
									if(website!='')	{ website =' website="'+website+'"';}
									return '\n[contactinfo '+name+address+state+city+zip+email+phone+mobile+website+']\n';
									break;
							}
						break;
				// G O O G L E   M A P 
			 case 'gmap':
					var width = jQuery('[name="gmap_width"]').val();
					var height = jQuery('[name="gmap_height"]').val();
					var address = jQuery('[name="gmap_address"]').val();
					var latitude = jQuery('[name="gmap_latitude"]').val();
					var longitude = jQuery('[name="gmap_longitude"]').val();
					var stylerscolor = jQuery('[name="gmap_stylerscolor"]').val();
					var zoom = jQuery('[name="gmap_zoom"]').val();
					var marker_desc = jQuery('[name="gmap_marker_desc"]').val();
					var popup = jQuery('[name="gmap_infowindow"]');
					var maptype = jQuery('[name="gmap_types"]').val();
					var controller = jQuery('[name="gmap_controller"]');
					if (popup.is('.atp-button')) {
						if (popup.is(':checked')) {
							popup = ' infowindow="true"';
						} else {
							popup = ' infowindow="false"';
						}
					}
					if (controller.is('.atp-button')) {
						if (controller.is(':checked')) {
							controller = ' controller="true"';
						} else {
							controller = ' controller="false"';
						}
					}
					if (width != '') {
						width = ' width="' + width + '"';
					}
					if (height != '') {
						height = ' height="' + height + '"';
					}
					if (address != '') {
						address = ' address="' + address + '"';
					}
					if (latitude != '') {
						latitude = ' latitude="' + latitude + '"';
					}
					if (longitude != '') {
						longitude = ' longitude="' + longitude + '"';
					}
					if (stylerscolor != '') {
						stylerscolor = ' color="' + stylerscolor + '"';
					}

					if (content != '') {
						html = ' html="' + marker_desc + '"';
					}
					if (zoom != '') {
						zoom = ' zoom="' + zoom + '"';
					}
					if (maptype != '') {
						maptype = ' maptype="' + maptype + '"';
					}
					return '[gmap' + width + height + latitude + longitude + address + zoom + html + popup + controller + maptype + stylerscolor + ']';
					break;
				// V I D E O 
				case 'video':
						var shortcodesub_video=jQuery('#secondary_video select').val();
						
						switch(shortcodesub_video){
							// F L A S H 
							//--------------------------------------------------------
							case 'flash':
									var width = jQuery('[name="video_flash_width"]').val();
									var height = jQuery('[name="video_flash_height"]').val();
									var src = jQuery('[name="video_flash_src"]').val();
									var id = jQuery('[name="video_flash_id"]').val();
									if(width!='')	{ width =' width="'+width+'"';}
									if(height!='')	{ height =' height="'+height+'"';}
									if(src!='')		{ src =' src="'+src+'"'; }
									if(id!='')		{ id =' id="'+id+'"'; }
								
									return '\n[flash'+width+height+src+id+']\n';	
									break;
							// V I M E O 
							//--------------------------------------------------------
							case 'vimeo':
									var width = jQuery('[name="video_vimeo_width"]').val();
									var height = jQuery('[name="video_vimeo_height"]').val();
									var clip_id = jQuery('[name="video_vimeo_clipid"]').val();
									var byline = jQuery('[name="video_vimeo_byline"]');
									var title = jQuery('[name="video_vimeo_title"]');
									var autoplay = jQuery('[name="video_vimeo_autoplay"]');
									var html5 = jQuery('[name="video_vimeo_html5"]');
									var loop = jQuery('[name="video_vimeo_loop"]');
									var portrait = jQuery('[name="video_vimeo_portrait"]');
									if(width!='')		{ width =' width="'+width+'"';}
									if(height!='')		{ height =' height="'+height+'"';	}
									if(src!='')			{ src =' src="'+src+'"';}
									if(clip_id!='')		{ clip_id	 =' clip_id="'+clip_id+'"';	}
									if(byline.is('.atp-button')){
										if(byline.is(':checked')){
											byline= ' byline="1"';	
										}else{
											byline= ' byline="0"';		
										}
									}	
									if(title.is('.atp-button')){
										if(title.is(':checked')){
										title= ' title="1"';	
										}else{
										title= ' title="0"';		
										}
									}	
									if(autoplay.is('.atp-button')){
										if(autoplay.is(':checked')){
										autoplay= ' autoplay="1"';	
										}else{
										autoplay= ' autoplay="0"';		
										}
									}	
									if(loop.is('.atp-button')){
										if(loop.is(':checked')){
										loop= ' loop="1"';	
										}else{
										loop= ' loop="0"';		
										}
									}	
									if(html5.is('.atp-button')){
										if(html5.is(':checked')){
										html5= ' html5="1"';	
										}else{
										html5= ' html5="0"';		
										}
									}	
									if(portrait.is('.atp-button')){
										if(portrait.is(':checked')){
										portrait= ' portrait="1"';	
										}else{
										portrait= ' portrait="0"';		
										}
									}	
									return '\n[vimeo'+width+height+title+clip_id+byline+autoplay+html5+portrait+']\n';	
									break;
							// Y O U T U B E
							//--------------------------------------------------------
							case 'youtube':
									var width = jQuery('[name="video_youtube_width"]').val();
									var height = jQuery('[name="video_youtube_height"]').val();
									var clipid = jQuery('[name="video_youtube_clipid"]').val();
									var autoplay = jQuery('[name="video_youtube_autoplay"]');
									var controls = jQuery('[name="video_youtube_controls"]');
									var loop = jQuery('[name="video_youtube_loop"]');
									var disablekb = jQuery('[name="video_youtube_disablekb"]');
									var hd = jQuery('[name="video_youtube_hd"]');
									var showinfo = jQuery('[name="video_youtube_showinfo"]');
									var showsearch = jQuery('[name="video_youtube_showsearch"]');
									if(width!='')			{ width =' width="'+width+'"'; }
									if(height!='')			{ height =' height="'+height+'"';	}
									if(clipid!='')			{ clip_id =' clipid="'+clipid+'"';}
									if(autoplay.is('.atp-button')){
										if(autoplay.is(':checked')){
											autoplay= ' autoplay="1"';	
										}else{
											autoplay= ' autoplay="0"';		
										}
									}
									if(controls.is('.atp-button')){
										if(controls.is(':checked')){
											controls= ' controls="1"';	
										}else{
											controls= ' controls="0"';		
										}
									}
									if(loop.is('.atp-button')){
										if(loop.is(':checked')){
											loop= ' loop="1"';	
										}else{
											loop= ' loop="0"';		
										}
									}
									if(disablekb.is('.atp-button')){
										if(disablekb.is(':checked')){
											disablekb= ' disablekb="1"';	
										}else{
											disablekb= ' disablekb="0"';		
										}
									}
									if(hd.is('.atp-button')){
										if(hd.is(':checked')){
											hd= ' hd="1"';	
										}else{
											hd= ' hd="0"';		
										}
									}
									if(showinfo.is('.atp-button')){
										if(showinfo.is(':checked')){
											showinfo= ' showinfo="1"';	
										}else{
											showinfo= ' showinfo="0"';		
										}
									}
									if(showsearch.is('.atp-button')){
										if(showsearch.is(':checked')){
											showsearch= ' showsearch="1"';	
										}else{
											showsearch= ' showsearch="0"';		
										}
									}	
									return '\n[youtube'+width+height+clip_id+autoplay+controls+loop+disablekb+hd+showinfo+showsearch+']\n';	
									break;
							// W O R D P R E S S   T V 
							//--------------------------------------------------------
							case 'wordpresstv':
									var width = jQuery('[name="video_wordpresstv_width"]').val();
									var height = jQuery('[name="video_wordpresstv_height"]').val();
									var clipid = jQuery('[name="video_wordpresstv_id"]').val();
									if(width!='')			{ width =' width="'+width+'"'; }
									if(height!='')			{ height =' height="'+height+'"';	}
									if(clipid!='')			{ id =' id="'+clipid+'"';}
									return '\n[wordpresstv'+width+height+id+']\n';	
									break;
							// B L I P T V 
							//--------------------------------------------------------
							case 'bliptv':
									var width = jQuery('[name="video_bliptv_width"]').val();
									var height = jQuery('[name="video_bliptv_height"]').val();
									var clipid = jQuery('[name="video_bliptv_id"]').val();
									if(width!='')			{ width =' width="'+width+'"'; }
									if(height!='')			{ height =' height="'+height+'"';	}
									if(clipid!='')			{ id =' id="'+clipid+'"';}
									return '\n[bliptv'+width+height+id+']\n';	
									break;
							case 'googlevideo':
									var width = jQuery('[name="video_googlevideo_width"]').val();
									var height = jQuery('[name="video_googlevideo_height"]').val();
									var clipid = jQuery('[name="video_googlevideo_id"]').val();
									if( width!='' ){ width =' width="'+width+'"'; }
									if( height!='' ){ height =' height="'+height+'"';	}
									if( clipid!='' ){ id =' id="'+clipid+'"';}
									return '\n[googlevideo'+width+height+id+']\n';	
									break;
						}	
						break;
				// L I G H T B O X 
				//--------------------------------------------------------
				// case 'lightbox':
						// var content = jQuery('[name="lightbox_content"]').val();
						// var height = jQuery('[name="lightbox_height"]').val();
						// var width = jQuery('[name="lightbox_width"]').val();
						// var lightboxhref = jQuery('[name="lightbox_href"]').val();
						// var title = jQuery('[name="lightbox_title"]').val();
						// var lightboxrel = jQuery('[name="lightbox_rel"]').val();
						// var iframe = jQuery('[name="lightbox_iframe"]');
						// var autoresize = jQuery('[name="lightbox_autoresize"]');
						// var inline = jQuery('[name="lightbox_inline"]').val();
						// var inlineid = jQuery('[name="lightbox_inlineid"]').val();
						// var html = jQuery('[name="lightbox_html"]').val();
						// if(content!='')		{ content = ''+content+''; }
						// if(width!='')		{ width =' width="'+width+'"'; }
						// if(title!='')		{ title	 =' title="'+title+'"';}
						// if(height!='')		{ height =' height="'+height+'"'; }
						// if(lightboxhref!='')		{ lightboxhref =' href="'+lightboxhref+'"'; }
						// if(lightboxrel !='')		{ lightboxrel =' rel="'+lightboxrel+'"'; }
						// if(autoresize.is('.atp-button')){
							// if(autoresize.is(':checked')){
							// autoresize= ' autoresize="true"';	
							// }else{
							// autoresize= ' autoresize="false"';		
							// }
						// }	
						// if(iframe.is('.atp-button')){
							// if(iframe.is(':checked')){
							// iframe= ' iframe="true"';	
							// }else{
							// iframe= ' iframe="false"';		
							// }
						// }		
						// return '\n[lightbox'+width+height+lightboxrel+title+lightboxhref+autoresize+iframe+']'+ content+'[/lightbox]\n';			
						// break;
				
				// P O R T F O L I O
				//--------------------------------------------------------
				case 'portfolio':
						var columns = jQuery('[name="portfolio_column"]').val();
						var portfolio_cat = jQuery('[name="portfolio_cat[]"]').val();
						var portfoliotitle = jQuery('[name="portfolio_title"]');
						var portfoliodesc = jQuery('[name="portfolio_desc"]');
						var portfolio_sidebar = jQuery('[name="portfolio_sidebar"]');
						//var portfolio_sortable = jQuery('[name="portfolio_sortable"]');
						var portfolio_limit = jQuery('[name="portfolio_limit"]').val();
						var portfolio_readmoretxt = jQuery('[name="portfolio_readmore"]').val();
						var portfoliomorebutton = jQuery('[name="portfolio_morebutton"]');
						var portfolio_limitcontent = jQuery('[name="portfolio_limitcontent"]').val();
						var portfoliopagination = jQuery('[name="portfolio_pagination"]');
						var portfolio_imgheight = jQuery('[name="portfolio_imgheight"]').val();
						if(columns !="")					{ columns = ' columns="'+columns+'"';}else{columns = ' columns="4"';}
						if(portfolio_imgheight !="")	{ imgheight = ' imgheight="'+portfolio_imgheight+'"';}else{imgheight = ' imgheight="250"';}
							if(portfoliotitle.is('.atp-button')){
							if(portfoliotitle.is(':checked')){
							title= ' title="true"';	
							}else{
							title= ' title="false"';		
							}
						}
						if(portfoliodesc.is('.atp-button')){
							if(portfoliodesc.is(':checked')){
							desc= ' desc="true"';	
							}else{
							desc= ' desc="false"';		
							}
						}	

						if(portfolio_cat == null)			{ portfolio_cat = "";}
						if(portfolio_cat!="")			{ cat = ' cat="'+portfolio_cat+'"';	}else{	cat = ' cat=""';}
						if(portfolio_limit!="")			{ limit = ' limit="'+portfolio_limit+'"';}else{limit	 = '';}
						if(portfolio_readmoretxt!="")		{ readmoretext = ' readmoretext="'+portfolio_readmoretxt+'"'; }else{ readmoretext = '';}
						if(portfoliomorebutton.is('.atp-button')){
							if(portfoliomorebutton.is(':checked')){
							readmore= ' readmore="true"';	
							}else{
							readmore= ' readmore="false"';		
							}
						}
						if(portfolio_sidebar.is('.atp-button')){
									if(portfolio_sidebar.is(':checked')){
									sidebar= ' sidebar="true"';	
									}else{
									sidebar= ' sidebar="false"';		
									}
								}
							
						if(portfoliopagination.is('.atp-button')){
							if(portfoliopagination.is(':checked')){
							pagination= ' pagination="true"';	
							}else{
							pagination= ' pagination="false"';		
							}
						}	
						if(portfolio_limitcontent!="")	{ charlimits = ' charlimits="'+portfolio_limitcontent+'"';}else{charlimits = ' charlimits="150"';}	
						return '[portfolio'+columns+cat+title+desc+limit+readmoretext+readmore+charlimits+pagination+imgheight+sidebar+']';
						break;
		/*** Todayspecial ***/
		case 'todayspecial':
			var todayspecial_tags = jQuery('[name="todayspecial_tags[]"]').val();
			var todayspecialtitle = jQuery('[name="todayspecial_title"]');
			var todayspecialdesc = jQuery('[name="todayspecial_desc"]');
			var todayspecial_limit = jQuery('[name="todayspecial_limit"]').val();
			var todayspecial_limitcontent = jQuery('[name="todayspecial_limitcontent"]').val();
			var todayspecialpagination = jQuery('[name="todayspecial_pagination"]');
			if(columns !="")					{ columns = ' columns="'+columns+'"';}else{columns = ' columns="4"';}
				if(todayspecialtitle.is('.atp-button')){
				if(todayspecialtitle.is(':checked')){
				title= ' title="true"';	
				}else{
				title= ' title="false"';		
				}
			}
			if(todayspecialdesc.is('.atp-button')){
				if(todayspecialdesc.is(':checked')){
				desc= ' desc="true"';	
				}else{
				desc= ' desc="false"';		
				}
			}	
			if(todayspecial_tags!="")			{ tags = ' tags="'+todayspecial_tags+'"';	}else{	tags = '';}
			if(todayspecial_limit!="")			{ limit = ' limit="'+todayspecial_limit+'"';}else{limit	 = '';}
			if(todayspecialpagination.is('.atp-button')){
				if(todayspecialpagination.is(':checked')){
				pagination= ' pagination="true"';	
				}else{
				pagination= ' pagination="false"';		
				}
			}	
			if(todayspecial_limitcontent!="")	{ charlimits = ' charlimits="'+todayspecial_limitcontent+'"';}else{charlimits = ' charlimits="150"';}	
			return '[todayspecial'+tags+title+desc+limit+charlimits+pagination+']';
			break;
		/*** Food Menu ***/
		case 'foodspecial':
			var foodspecial_cats = jQuery('[name="foodspecial_cats[]"]').val();
			var foodspecialtitle = jQuery('[name="foodspecial_title"]');
			var foodspecialthumb = jQuery('[name="foodspecial_thumb"]');
			var foodspecialdesc = jQuery('[name="foodspecial_desc"]');
			var foodspecial_limit = jQuery('[name="foodspecial_limit"]').val();
			var foodspecial_limitcontent = jQuery('[name="foodspecial_limitcontent"]').val();
			var foodspecialpagination = jQuery('[name="foodspecial_pagination"]');
			var foodcolumns = jQuery('[name="foodspecial_columns"]');
			if(foodspecialtitle.is('.atp-button')){
				if(foodspecialtitle.is(':checked')){
				title= ' title="true"';	
				}else{
				title= ' title="false"';
				}
			}
			if(foodspecialthumb.is('.atp-button')){
				if(foodspecialthumb.is(':checked')){
				thumb= ' thumb="true"';	
				}else{
				thumb= ' thumb="false"';
				}
			}
			if(foodspecialdesc.is('.atp-button')){
				if(foodspecialdesc.is(':checked')){
				desc= ' desc="true"';
				}else{
				desc= ' desc="false"';
				}
			}	
			if(foodspecial_cats!="")			{ cats = ' cats="'+foodspecial_cats+'"';	}else{	cats = '';}
			if(foodspecial_limit!="")			{ limit = ' limit="'+foodspecial_limit+'"';}else{limit	 = '';}
			if(foodspecialpagination.is('.atp-button')){
				if(foodspecialpagination.is(':checked')){
				pagination= ' pagination="true"';	
				}else{
				pagination= ' pagination="false"';		
				}
			}	
			if(foodcolumns.is('.atp-button')){
				if(foodcolumns.is(':checked')){
				columns= ' columns="true"';	
				}else{
				columns= ' columns="false"';		
				}
			}	
			if(foodspecial_limitcontent!="")	{ charlimits = ' charlimits="'+foodspecial_limitcontent+'"';}else{charlimits = ' charlimits="150"';}	
			return '[foodmenu'+cats+thumb+title+desc+limit+charlimits+pagination+columns+']';
			break;
			}
		
		},
		sendToEditor :function(){
			send_to_editor(shortcode.generate());
		}
	}
	jQuery(document).ready( function() {
		shortcode.init();
	});