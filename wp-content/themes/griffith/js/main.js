//-------------------------------------------- Flatiron Director

// Version		: 1.2.8
// Source		: https://github.com/flatiron/director

(function(a){function c(){return b.hash===""||b.hash==="#"}function f(a,b){for(var c=0;c<a.length;c+=1)if(b(a[c],c,a)===!1)return}function g(a){var b=[];for(var c=0,d=a.length;c<d;c++)b=b.concat(a[c]);return b}function h(a,b,c){if(!a.length)return c();var d=0;(function e(){b(a[d],function(b){b||b===!1?(c(b),c=function(){}):(d+=1,d===a.length?c():e())})})()}function i(a,b,c){c=a;for(var d in b)if(b.hasOwnProperty(d)){c=b[d](a);if(c!==a)break}return c===a?"([._a-zA-Z0-9-%()]+)":c}function j(a,b){var c,d=0,e="";while(c=a.substr(d).match(/[^\w\d\- %@&]*\*[^\w\d\- %@&]*/))d=c.index+c[0].length,c[0]=c[0].replace(/^\*/,"([_.()!\\ %@&a-zA-Z0-9-]+)"),e+=a.substr(0,c.index)+c[0];a=e+=a.substr(d);var f=a.match(/:([^\/]+)/ig),g,h;if(f){h=f.length;for(var j=0;j<h;j++)g=f[j],g.slice(0,2)==="::"?a=g.slice(1):a=a.replace(g,i(g,b))}return a}function k(a,b,c,d){var e=0,f=0,g=0,c=(c||"(").toString(),d=(d||")").toString(),h;for(h=0;h<a.length;h++){var i=a[h];if(i.indexOf(c,e)>i.indexOf(d,e)||~i.indexOf(c,e)&&!~i.indexOf(d,e)||!~i.indexOf(c,e)&&~i.indexOf(d,e)){f=i.indexOf(c,e),g=i.indexOf(d,e);if(~f&&!~g||!~f&&~g){var j=a.slice(0,(h||1)+1).join(b);a=[j].concat(a.slice((h||1)+1))}e=(g>f?g:f)+1,h=0}else e=0}return a}var b=document.location,d={mode:"modern",hash:b.hash,history:!1,check:function(){var a=b.hash;a!=this.hash&&(this.hash=a,this.onHashChanged())},fire:function(){this.mode==="modern"?this.history===!0?window.onpopstate():window.onhashchange():this.onHashChanged()},init:function(a,b){function d(a){for(var b=0,c=e.listeners.length;b<c;b++)e.listeners[b](a)}var c=this;this.history=b,e.listeners||(e.listeners=[]);if("onhashchange"in window&&(document.documentMode===undefined||document.documentMode>7))this.history===!0?setTimeout(function(){window.onpopstate=d},500):window.onhashchange=d,this.mode="modern";else{var f=document.createElement("iframe");f.id="state-frame",f.style.display="none",document.body.appendChild(f),this.writeFrame(""),"onpropertychange"in document&&"attachEvent"in document&&document.attachEvent("onpropertychange",function(){event.propertyName==="location"&&c.check()}),window.setInterval(function(){c.check()},50),this.onHashChanged=d,this.mode="legacy"}return e.listeners.push(a),this.mode},destroy:function(a){if(!e||!e.listeners)return;var b=e.listeners;for(var c=b.length-1;c>=0;c--)b[c]===a&&b.splice(c,1)},setHash:function(a){return this.mode==="legacy"&&this.writeFrame(a),this.history===!0?(window.history.pushState({},document.title,a),this.fire()):b.hash=a[0]==="/"?a:"/"+a,this},writeFrame:function(a){var b=document.getElementById("state-frame"),c=b.contentDocument||b.contentWindow.document;c.open(),c.write("<script>_hash = '"+a+"'; onload = parent.listener.syncHash;<script>"),c.close()},syncHash:function(){var a=this._hash;return a!=b.hash&&(b.hash=a),this},onHashChanged:function(){}},e=a.Router=function(a){if(this instanceof e)this.params={},this.routes={},this.methods=["on","once","after","before"],this.scope=[],this._methods={},this._insert=this.insert,this.insert=this.insertEx,this.historySupport=(window.history!=null?window.history.pushState:null)!=null,this.configure(),this.mount(a||{});else return new e(a)};e.prototype.init=function(a){var e=this,f;return this.handler=function(a){var b=a&&a.newURL||window.location.hash,c=e.history===!0?e.getPath():b.replace(/.*#/,"");e.dispatch("on",c.charAt(0)==="/"?c:"/"+c)},d.init(this.handler,this.history),this.history===!1?c()&&a?b.hash=a:c()||e.dispatch("on","/"+b.hash.replace(/^(#\/|#|\/)/,"")):(this.convert_hash_in_init?(f=c()&&a?a:c()?null:b.hash.replace(/^#/,""),f&&window.history.replaceState({},document.title,f)):f=this.getPath(),(f||this.run_in_init===!0)&&this.handler()),this},e.prototype.explode=function(){var a=this.history===!0?this.getPath():b.hash;return a.charAt(1)==="/"&&(a=a.slice(1)),a.slice(1,a.length).split("/")},e.prototype.setRoute=function(a,b,c){var e=this.explode();return typeof a=="number"&&typeof b=="string"?e[a]=b:typeof c=="string"?e.splice(a,b,s):e=[a],d.setHash(e.join("/")),e},e.prototype.insertEx=function(a,b,c,d){return a==="once"&&(a="on",c=function(a){var b=!1;return function(){if(b)return;return b=!0,a.apply(this,arguments)}}(c)),this._insert(a,b,c,d)},e.prototype.getRoute=function(a){var b=a;if(typeof a=="number")b=this.explode()[a];else if(typeof a=="string"){var c=this.explode();b=c.indexOf(a)}else b=this.explode();return b},e.prototype.destroy=function(){return d.destroy(this.handler),this},e.prototype.getPath=function(){var a=window.location.pathname;return a.substr(0,1)!=="/"&&(a="/"+a),a};var l=/\?.*/;e.prototype.configure=function(a){a=a||{};for(var b=0;b<this.methods.length;b++)this._methods[this.methods[b]]=!0;return this.recurse=typeof a.recurse=="undefined"?this.recurse||!1:a.recurse,this.async=a.async||!1,this.delimiter=a.delimiter||"/",this.strict=typeof a.strict=="undefined"?!0:a.strict,this.notfound=a.notfound,this.resource=a.resource,this.history=a.html5history&&this.historySupport||!1,this.run_in_init=this.history===!0&&a.run_handler_in_init!==!1,this.convert_hash_in_init=this.history===!0&&a.convert_hash_in_init!==!1,this.every={after:a.after||null,before:a.before||null,on:a.on||null},this},e.prototype.param=function(a,b){a[0]!==":"&&(a=":"+a);var c=new RegExp(a,"g");return this.params[a]=function(a){return a.replace(c,b.source||b)},this},e.prototype.on=e.prototype.route=function(a,b,c){var d=this;!c&&typeof b=="function"&&(c=b,b=a,a="on");if(Array.isArray(b))return b.forEach(function(b){d.on(a,b,c)});b.source&&(b=b.source.replace(/\\\//ig,"/"));if(Array.isArray(a))return a.forEach(function(a){d.on(a.toLowerCase(),b,c)});b=b.split(new RegExp(this.delimiter)),b=k(b,this.delimiter),this.insert(a,this.scope.concat(b),c)},e.prototype.path=function(a,b){var c=this,d=this.scope.length;a.source&&(a=a.source.replace(/\\\//ig,"/")),a=a.split(new RegExp(this.delimiter)),a=k(a,this.delimiter),this.scope=this.scope.concat(a),b.call(this,this),this.scope.splice(d,a.length)},e.prototype.dispatch=function(a,b,c){function h(){d.last=e.after,d.invoke(d.runlist(e),d,c)}var d=this,e=this.traverse(a,b.replace(l,""),this.routes,""),f=this._invoked,g;return this._invoked=!0,!e||e.length===0?(this.last=[],typeof this.notfound=="function"&&this.invoke([this.notfound],{method:a,path:b},c),!1):(this.recurse==="forward"&&(e=e.reverse()),g=this.every&&this.every.after?[this.every.after].concat(this.last):[this.last],g&&g.length>0&&f?(this.async?this.invoke(g,this,h):(this.invoke(g,this),h()),!0):(h(),!0))},e.prototype.invoke=function(a,b,c){var d=this,e;this.async?(e=function(c,d){if(Array.isArray(c))return h(c,e,d);typeof c=="function"&&c.apply(b,(a.captures||[]).concat(d))},h(a,e,function(){c&&c.apply(b,arguments)})):(e=function(c){if(Array.isArray(c))return f(c,e);if(typeof c=="function")return c.apply(b,a.captures||[]);typeof c=="string"&&d.resource&&d.resource[c].apply(b,a.captures||[])},f(a,e))},e.prototype.traverse=function(a,b,c,d,e){function l(a){function b(a){var c=[];for(var d=0;d<a.length;d++)c[d]=Array.isArray(a[d])?b(a[d]):a[d];return c}function c(a){for(var b=a.length-1;b>=0;b--)Array.isArray(a[b])?(c(a[b]),a[b].length===0&&a.splice(b,1)):e(a[b])||a.splice(b,1)}if(!e)return a;var d=b(a);return d.matched=a.matched,d.captures=a.captures,d.after=a.after.filter(e),c(d),d}var f=[],g,h,i,j,k;if(b===this.delimiter&&c[a])return j=[[c.before,c[a]].filter(Boolean)],j.after=[c.after].filter(Boolean),j.matched=!0,j.captures=[],l(j);for(var m in c)if(c.hasOwnProperty(m)&&(!this._methods[m]||this._methods[m]&&typeof c[m]=="object"&&!Array.isArray(c[m]))){g=h=d+this.delimiter+m,this.strict||(h+="["+this.delimiter+"]?"),i=b.match(new RegExp("^"+h));if(!i)continue;if(i[0]&&i[0]==b&&c[m][a])return j=[[c[m].before,c[m][a]].filter(Boolean)],j.after=[c[m].after].filter(Boolean),j.matched=!0,j.captures=i.slice(1),this.recurse&&c===this.routes&&(j.push([c.before,c.on].filter(Boolean)),j.after=j.after.concat([c.after].filter(Boolean))),l(j);j=this.traverse(a,b,c[m],g);if(j.matched)return j.length>0&&(f=f.concat(j)),this.recurse&&(f.push([c[m].before,c[m][a]].filter(Boolean)),j.after=j.after.concat([c[m].after].filter(Boolean)),c===this.routes&&(f.push([c.before,c.on].filter(Boolean)),j.after=j.after.concat([c.after].filter(Boolean)))),f.matched=!0,f.captures=j.captures,f.after=j.after,l(f)}return!1},e.prototype.insert=function(a,b,c,d){var e,f,g,h,i;b=b.filter(function(a){return a&&a.length>0}),d=d||this.routes,i=b.shift(),/\:|\*/.test(i)&&!/\\d|\\w/.test(i)&&(i=j(i,this.params));if(b.length>0)return d[i]=d[i]||{},this.insert(a,b,c,d[i]);if(!i&&!b.length&&d===this.routes){e=typeof d[a];switch(e){case"function":d[a]=[d[a],c];return;case"object":d[a].push(c);return;case"undefined":d[a]=c;return}return}f=typeof d[i],g=Array.isArray(d[i]);if(d[i]&&!g&&f=="object"){e=typeof d[i][a];switch(e){case"function":d[i][a]=[d[i][a],c];return;case"object":d[i][a].push(c);return;case"undefined":d[i][a]=c;return}}else if(f=="undefined"){h={},h[a]=c,d[i]=h;return}throw new Error("Invalid route context: "+f)},e.prototype.extend=function(a){function e(a){b._methods[a]=!0,b[a]=function(){var c=arguments.length===1?[a,""]:[a];b.on.apply(b,c.concat(Array.prototype.slice.call(arguments)))}}var b=this,c=a.length,d;for(d=0;d<c;d++)e(a[d])},e.prototype.runlist=function(a){var b=this.every&&this.every.before?[this.every.before].concat(g(a)):g(a);return this.every&&this.every.on&&b.push(this.every.on),b.captures=a.captures,b.source=a.source,b},e.prototype.mount=function(a,b){function d(b,d){var e=b,f=b.split(c.delimiter),g=typeof a[b],h=f[0]===""||!c._methods[f[0]],i=h?"on":e;h&&(e=e.slice((e.match(new RegExp("^"+c.delimiter))||[""])[0].length),f.shift());if(h&&g==="object"&&!Array.isArray(a[b])){d=d.concat(f),c.mount(a[b],d);return}h&&(d=d.concat(e.split(c.delimiter)),d=k(d,c.delimiter)),c.insert(i,d,a[b])}if(!a||typeof a!="object"||Array.isArray(a))return;var c=this;b=b||[],Array.isArray(b)||(b=b.split(c.delimiter));for(var e in a)a.hasOwnProperty(e)&&d(e,b.slice(0))}})(typeof exports=="object"?exports:window);

//-------------------------------------------- jQuery scrollTo

// Version		: 2.1.1
// Source		: https://github.com/flesler/jquery.scrollTo
// Dependencies	: jQuery

(function(f){"use strict";"function"===typeof define&&define.amd?define(["jquery"],f):"undefined"!==typeof module&&module.exports?module.exports=f(require("jquery")):f(jQuery)})(function($){"use strict";function n(a){return!a.nodeName||-1!==$.inArray(a.nodeName.toLowerCase(),["iframe","#document","html","body"])}function h(a){return $.isFunction(a)||$.isPlainObject(a)?a:{top:a,left:a}}var p=$.scrollTo=function(a,d,b){return $(window).scrollTo(a,d,b)};p.defaults={axis:"xy",duration:0,limit:!0};$.fn.scrollTo=function(a,d,b){"object"=== typeof d&&(b=d,d=0);"function"===typeof b&&(b={onAfter:b});"max"===a&&(a=9E9);b=$.extend({},p.defaults,b);d=d||b.duration;var u=b.queue&&1<b.axis.length;u&&(d/=2);b.offset=h(b.offset);b.over=h(b.over);return this.each(function(){function k(a){var k=$.extend({},b,{queue:!0,duration:d,complete:a&&function(){a.call(q,e,b)}});r.animate(f,k)}if(null!==a){var l=n(this),q=l?this.contentWindow||window:this,r=$(q),e=a,f={},t;switch(typeof e){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(e)){e= h(e);break}e=l?$(e):$(e,q);if(!e.length)return;case "object":if(e.is||e.style)t=(e=$(e)).offset()}var v=$.isFunction(b.offset)&&b.offset(q,e)||b.offset;$.each(b.axis.split(""),function(a,c){var d="x"===c?"Left":"Top",m=d.toLowerCase(),g="scroll"+d,h=r[g](),n=p.max(q,c);t?(f[g]=t[m]+(l?0:h-r.offset()[m]),b.margin&&(f[g]-=parseInt(e.css("margin"+d),10)||0,f[g]-=parseInt(e.css("border"+d+"Width"),10)||0),f[g]+=v[m]||0,b.over[m]&&(f[g]+=e["x"===c?"width":"height"]()*b.over[m])):(d=e[m],f[g]=d.slice&& "%"===d.slice(-1)?parseFloat(d)/100*n:d);b.limit&&/^\d+$/.test(f[g])&&(f[g]=0>=f[g]?0:Math.min(f[g],n));!a&&1<b.axis.length&&(h===f[g]?f={}:u&&(k(b.onAfterFirst),f={}))});k(b.onAfter)}})};p.max=function(a,d){var b="x"===d?"Width":"Height",h="scroll"+b;if(!n(a))return a[h]-$(a)[b.toLowerCase()]();var b="client"+b,k=a.ownerDocument||a.document,l=k.documentElement,k=k.body;return Math.max(l[h],k[h])-Math.min(l[b],k[b])};$.Tween.propHooks.scrollLeft=$.Tween.propHooks.scrollTop={get:function(a){return $(a.elem)[a.prop]()}, set:function(a){var d=this.get(a);if(a.options.interrupt&&a._last&&a._last!==d)return $(a.elem).stop();var b=Math.round(a.now);d!==b&&($(a.elem)[a.prop](b),a._last=this.get(a))}};return p});

//-------------------------------------------- jQuery Finger

// Version		: 0.1.2
// Source		: https://github.com/ngryman/jquery.finger
// Dependencies	: jQuery

(function(e,t){var b=/chrome/i.exec(t),x=/android/i.exec(t),w="ontouchstart" in window&&!(b&&!x),q=w?"touchstart":"mousedown",u=w?"touchend touchcancel":"mouseup mouseleave",c=w?"touchmove":"mousemove",m="finger",j=e("html")[0],f={},r={},p,d,v,k,o,h,a=e.Finger={pressDuration:300,doubleTapInterval:300,flickDuration:150,motionThreshold:5};function i(z){z.preventDefault();e.event.remove(j,"click",i)}function g(A,z){return(w?z.originalEvent.touches[0]:z)["page"+A.toUpperCase()]}function n(B,C,z){var A=e.Event(C,r);e.event.trigger(A,{originalEvent:B},B.target);if(A.isDefaultPrevented()){if(~C.indexOf("tap")&&!w){e.event.add(j,"click",i)}else{B.preventDefault()}}if(z){e.event.remove(j,c+"."+m,s);e.event.remove(j,u+"."+m,l)}}function y(A){var z=A.timeStamp||+new Date();if(v==z){return}v=z;f.x=r.x=g("x",A);f.y=r.y=g("y",A);f.time=z;f.target=A.target;r.orientation=null;r.end=false;p=false;d=false;k=setTimeout(function(){d=true;n(A,"press")},e.Finger.pressDuration);e.event.add(j,c+"."+m,s);e.event.add(j,u+"."+m,l);if(a.preventDefault){A.preventDefault();e.event.add(j,"click",i)}}function s(z){r.x=g("x",z);r.y=g("y",z);r.dx=r.x-f.x;r.dy=r.y-f.y;r.adx=Math.abs(r.dx);r.ady=Math.abs(r.dy);p=r.adx>a.motionThreshold||r.ady>a.motionThreshold;if(!p){return}clearTimeout(k);if(!r.orientation){if(r.adx>r.ady){r.orientation="horizontal";r.direction=r.dx>0?+1:-1}else{r.orientation="vertical";r.direction=r.dy>0?+1:-1}}while(z.target&&z.target!==f.target){z.target=z.target.parentNode}if(z.target!==f.target){z.target=f.target;l.call(this,e.Event(u+"."+m,z));return}n(z,"drag")}function l(C){var z=C.timeStamp||+new Date(),B=z-f.time,D;clearTimeout(k);if(!p&&!d&&C.target===f.target){var A=o===C.target&&z-h<a.doubleTapInterval;D=A?"doubletap":"tap";o=A?null:f.target;h=z}else{C.target=f.target;if(B<a.flickDuration){n(C,"flick")}r.end=true;D="drag"}n(C,D,true)}e.event.add(j,q+"."+m,y);e.each(["tap","doubletap","press","drag","flick"],function(A,z){e.fn[z]=function(B){return B?this.on(z,B):this.trigger(z)}})})(jQuery,navigator.userAgent);

//-------------------------------------------- Mini jQuery plugins & extensions

(function($) {

//---------------------- Toggles classname ensuring sibling exclusivity

	$.fn.toggleExclusiveClass = function(classes, toggle) {
		if (this.parent().attr('data-expandable') === 'multiple') {
			this.toggleClass(classes, toggle);
		} else {
			this.toggleClass(classes, toggle).siblings().removeClass(classes);
		}
		return this;
	};

//---------------------- Gets previous element, looping at the first child

// See: http://stackoverflow.com/a/15959855

	$.fn.prevOrLast = function(selector) {
		var prev = this.prev(selector);
		return (prev.length) ? prev : this.nextAll(selector).last();
	};

//---------------------- Gets next element, looping at the last child

// See: http://stackoverflow.com/a/15959855

	$.fn.nextOrFirst = function(selector) {
		var next = this.next(selector);
		return (next.length) ? next : this.prevAll(selector).last();
	};
}(jQuery));

//-------------------------------------------- Document ready

$(function() {

//-------------------------------------------- Site nav

	var	$siteNav		= $('#header nav'),
		$siteNavToggle	= $siteNav.find('.toggle');

//---------------------- Nav toggle

	$siteNavToggle.on('click', function() {
		// Toggle menu
		$siteNav.toggleClass('active');
		// If closing, close submenus
		if (!$siteNav.hasClass('active')) $siteNav.find('li.active').removeClass('active');
	});

//---------------------- Submenu toggles

	$siteNav.find('[href="#"]').on('click', function(event) {
		event.preventDefault();
	});

	// $('#header').on('touchstart', function(event) {
	// 	$(this).find('nav .menu-item-has-children > a[href!=#]').next().hide();
	// });

	var lastMenuItemClicked = [];

	$siteNav.find('a').click(function() {
		$li = $(this).parent();
		
		if($li.find('ul').length) {

			if($li.parents('li').length < 2) {
				event.preventDefault();
			}

			if($li.hasClass('active')) {
				$li.removeClass('active');
				return;
			}

			//if(!$li.parents('li').length) {// && lastMenuItemClicked[0] != $li[0]) {
				//event.preventDefault();
			//}
			lastMenuItemClicked = $li;

			$siteNav.find('.active').removeClass('active');
			$li.addClass('active');
			$li.parents('li').addClass('active');
		}
	});

	// $siteNav.find('li').on('focusin', function() {
	// 	$(this).addClass('active');
	// }).on('focusout', function() {
	// 	$(this).removeClass('active');
	// });

// ---------------- all mobile-only class must close upon clicking
	$siteNav.find('.mobile-only').on('click', function() {
		$siteNavToggle.click();	
	});

//-------------------------------------------- Enquiry form

	var	enquiryFormId	= 'enquiry-form',
		$enquiryForm	= $('#' + enquiryFormId);

//---------------------- Toggles enquiry form expanded state

	function toggleEnquiryForm(toggle) {
		if (typeof toggle === 'undefined') toggle = !$enquiryForm.hasClass('expanded');
		// Toggle form expanded state
		$enquiryForm.toggleClass('expanded', toggle);
		// When closing clear the URL route
		if (!toggle) deactivateRouteSegment('/' + enquiryFormId);
	}

//---------------------- Toggle button

	$enquiryForm.find('.expand-toggle').on('click', function() {
		if (!$enquiryForm.hasClass('expanded')) activateRoute('#/' + enquiryFormId);
		else toggleEnquiryForm(false);
	});

//---------------------- Misc. form links

	var	$programField 			= $('.program-field select'),
		programCodePlaceholder  = '##PROGRAMCODE##',
		topHeaderContent 		= $('#enquiry-form .header');

	$(document).on('click', '[href="#' + enquiryFormId + '"]', function(event) {
		event.preventDefault();
		var programCode = $(this).attr('data-program');
		activateRoute('#/' + enquiryFormId);
		if (programCode) {
			$programField.val($programField.find('option[data-program-code=' + programCode + ']').attr('value')).trigger('change');
		}
		return false;
	});

//---------------------- Enable dynamic form feedback PDF link

	function rememberSelectedProgram() {
		var programCode = $programField.find(':selected').attr('data-program-code');
		$enquiryForm.attr('data-program-code', programCode);
		if (programObjectives[programCode]) {
			for (var formId in programObjectives[programCode]) {
				var $form = $('#frm_form_' + formId + '_container');
				if ($form.length) {
					var listIndex = 0;
					$form.find('.objective-field ul li').show().each(function () {
						var $element = $(this);
						var $elementInput = $(this).find('input');
						$elementInput.prop('disabled', false);
						if (!programObjectives[programCode][formId][listIndex]) {
							$element.hide();
							$elementInput.prop('disabled', true);
						}
						listIndex++;
					});
				}
			}
		}
	}

	if ($programField.length) {
		rememberSelectedProgram();
		$programField.on('change', rememberSelectedProgram);
		$(document).ajaxComplete(function (event, xhr, settings) {					
			if (settings.url.indexOf('admin-ajax.php') > 0 && xhr.responseText.indexOf(programCodePlaceholder) > 0) {
				var $programLink = $('[href*=' + programCodePlaceholder + ']');
				$programLink.attr('href', $programLink.attr('href').replace(programCodePlaceholder, $enquiryForm.attr('data-program-code')));

				//add timestamp to prevent caching
				$programLink.each(function () {
					$(this).attr('href', $(this).attr('href') + '?t=' + Date.now());
				});

				//Hide the Top Header Form content after successful
				if(topHeaderContent.length > 0) {
					topHeaderContent.hide();
				}

			}

				
		});
	}

//---------------------- Enable refresh page button

	$(document).on('click', '.refresh-page', function() {
		window.location = window.location.pathname;
	});

//-------------------------------------------- Tabbed lists

//---------------------- Opens a tab

	function openTab($tab, cancelCycle) {
		if (typeof cancelCycle === 'undefined') cancelCycle = false;
		// Check tab not already active
		if (!$tab.hasClass('active')) {
			var $container = $tab.closest('.tabbed');
			// Possibly cancel cycle
			if (cancelCycle) $container.removeClass('cycle');
			// Update nav tab buttons
			$container.find('nav').find('[href="#' + $tab.attr('id') + '"]').closest('li').toggleExclusiveClass('active', true);
			// If tabs are sliding reveal active tab
			if ($container.hasClass('sliding')) $container.children('ol').css('right', $tab.index() * 100 + '%');
			// Set active tab
			$tab.toggleExclusiveClass('active', true);
		}
	}

//---------------------- Enable automatic cycling

// Cycle is canceled on manual interaction.

	var	cycleDuration	= 4500,
		cycleCount		= 0;

	$('.tabbed.cycle').each(function() {
		var	$container	= $(this),
			$tabs		= $container.find('> ol');
		// Only cycle if there is more than one list item
		if ($tabs.children().length > 1) {
			// Begins the cycle
			function beginCycle() {
				setInterval(function() {
					// Check cycle still enabled
					if ($container.hasClass('cycle')) {
						openTab($tabs.children('.active').nextOrFirst());
					}
				}, cycleDuration);
			}
			// Count and alternate cycles so they don't change simultaneously
			if (++cycleCount & 1) beginCycle();
			else setTimeout(beginCycle, cycleDuration / 2);
		}
	});

//---------------------- Enable tab nav links

	$('.tabbed nav a').on('click', function(event) {
		event.preventDefault();
		openTab($(this.hash), true);
	});

//---------------------- Enable tab nav via horizontal swipe guestures

	$('.tabbed').on('flick', function(event) {
		if (event.orientation == 'horizontal') {
			event.preventDefault();
			var	$container	= $(this),
				$tab		= $container.find('> ol > .active');
			openTab((event.direction == 1 ? $tab.prevOrLast() : $tab.nextOrFirst()), true);
		}
	});

//---------------------- Handle tab nav via keyboard

	$('.tabbed > ol > li').on('focusin', function() {
		openTab($(this), true);
	});

//-------------------------------------------- Accordions

//---------------------- Opens an accordion tab

	function openAccordion($tab) {
		$tab.toggleExclusiveClass('active');
	}

//---------------------- Enable accordion tab toggles

	$('.accordion .toggle').on('click', function(event) {
		event.preventDefault();
		openAccordion($(this.hash));
	});

//-------------------------------------------- URL hash routing

//---------------------- Deactivates a URL hash route segment

	function deactivateRouteSegment(segment) {
		// Get URL hash route before segment
		var splitHash = location.hash.split(segment)[0];
		// Update hash if segment in URL hash route
		if (location.hash != splitHash) location.hash = splitHash;
	}

//---------------------- Activates a URL hash route

	function activateRoute(hash) {
		if (location.hash == hash) {
			// Rerun current URL hash
			router.handler();
		} else {
			// Set new URL hash
			location.hash = hash;
		}
	}

    var $frame = $('.categories.mobile');
    var $slidee = $frame.children('ul').eq(0);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
        horizontal: 1,
        itemNav: 'basic',
        smart: false,
        activateOn: 'click',
        mouseDragging: 1,
        touchDragging: 1,
        //releaseSwing: 1,
        startAt: $frame.find('li.active').index,
        activatePageOn: 'click',
        speed: 300,
        elasticBounds: 0
    });

//---------------------- Set route actions

// See: https://github.com/flatiron/director#routing-table

	var routes = {};
	routes['/' + enquiryFormId] = {
		on: function() {
			toggleEnquiryForm(true);
		}
	};

//---------------------- Set scroll actions

	if($('.categories.mobile').length) {
		var mobileCategoriesInitTopOffset = $('.categories.mobile').offset().top;

		$(window).scroll(function () {
            if($('.categories.mobile').offset().top - $(window).scrollTop() <= 0) {
                $('.categories.mobile').addClass('fixed');
            }

            if($(window).scrollTop() < mobileCategoriesInitTopOffset) {
                $('.categories.mobile').removeClass('fixed');
            }
        });
    }


//---------------------- Set autoscroll components

// Keys are URL hash route chunk component names.

	var autoscroll = {};
	autoscroll[enquiryFormId] = {
		target	: '#' + enquiryFormId,
		offset	: 0
	};

//---------------------- Run router

	var router = Router(routes).configure({
		recurse	: 'forward',
		strict	: false,
		on		: function() {
					// Get current route
					var route = this.getRoute();
					// Loop route chunks in reverse searching for the deepest autoscroll component
					for (var index = route.length - 1; index >= 0; index--) {
						var chunk = route[index];
						// Check if chunk is an autoscroll component
						if (chunk in autoscroll) {
							$.scrollTo(
								// Note: Unique route chunks are not followed by an ID chunk
								$('#' + (index == 0 ? chunk : route[index + 1])).closest(autoscroll[chunk]['target']),
								{
									duration	: 600,
									offset		: autoscroll[chunk]['offset'],
									onAfter		: function($target) {
										$target.trigger('arrival');
									}
								}
							);
							// End search
							break;
						}
					}
				}
	});
	router.init();

	$(document).ready(function() {
		$('img').each(function() {
			if(~$(this).attr('src').indexOf('ipac.ctnsnet.com/int/integration')) {
				$(this).hide();
			}
		});
	});
});