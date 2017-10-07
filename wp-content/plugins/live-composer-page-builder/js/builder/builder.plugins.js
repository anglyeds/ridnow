'use strict';

/*! Sortable 1.4.2 - MIT | git://github.com/rubaxa/Sortable.git */
!function(a){"use strict";"function"==typeof define&&define.amd?define(a):"undefined"!=typeof module&&"undefined"!=typeof module.exports?module.exports=a():"undefined"!=typeof Package?Sortable=a():window.Sortable=a()}(function(){"use strict";function F(a,b){if(!a||!a.nodeType||1!==a.nodeType)throw"Sortable: `el` must be HTMLElement, and not "+{}.toString.call(a);this.el=a,this.options=b=X({},b),a[t]=this;var c={group:Math.random(),sort:!0,disabled:!1,store:null,handle:null,scroll:!0,scrollSensitivity:30,scrollSpeed:10,draggable:/[uo]l/i.test(a.nodeName)?"li":">*",ghostClass:"sortable-ghost",chosenClass:"sortable-chosen",ignore:"a, img",filter:null,animation:0,setData:function(a,b){a.setData("Text",b.textContent)},dropBubble:!1,dragoverBubble:!1,dataIdAttr:"data-id",delay:0,forceFallback:!1,fallbackClass:"sortable-fallback",fallbackOnBody:!1};for(var d in c)!(d in b)&&(b[d]=c[d]);E(b);for(var e in this)"_"===e.charAt(0)&&(this[e]=this[e].bind(this));this.nativeDraggable=!b.forceFallback&&x,J(a,"mousedown",this._onTapStart),J(a,"touchstart",this._onTapStart),this.nativeDraggable&&(J(a,"dragover",this),J(a,"dragenter",this)),C.push(this._onDragOver),b.store&&this.sort(b.store.get(this))}function G(b){d&&d.state!==b&&(M(d,"display",b?"none":""),!b&&d.state&&e.insertBefore(d,a),d.state=b)}function H(a,b,c){if(a){c=c||v;do if(">*"===b&&a.parentNode===c||V(a,b))return a;while(a!==c&&(a=a.parentNode))}return null}function I(a){a.dataTransfer&&(a.dataTransfer.dropEffect="move"),a.preventDefault()}function J(a,b,c){a.addEventListener(b,c,!1)}function K(a,b,c){a.removeEventListener(b,c,!1)}function L(a,b,c){if(a)if(a.classList)a.classList[c?"add":"remove"](b);else{var d=(" "+a.className+" ").replace(s," ").replace(" "+b+" "," ");a.className=(d+(c?" "+b:"")).replace(s," ")}}function M(a,b,c){var d=a&&a.style;if(d){if(void 0===c)return v.defaultView&&v.defaultView.getComputedStyle?c=v.defaultView.getComputedStyle(a,""):a.currentStyle&&(c=a.currentStyle),void 0===b?c:c[b];b in d||(b="-webkit-"+b),d[b]=c+("string"==typeof c?"":"px")}}function N(a,b,c){if(a){var d=a.getElementsByTagName(b),e=0,f=d.length;if(c)for(;e<f;e++)c(d[e],e);return d}return[]}function O(a,b,c,e,f,g,h){var i=v.createEvent("Event"),j=(a||b[t]).options,k="on"+c.charAt(0).toUpperCase()+c.substr(1);i.initEvent(c,!0,!0),i.to=b,i.from=f||b,i.item=e||b,i.clone=d,i.oldIndex=g,i.newIndex=h,b.dispatchEvent(i),j[k]&&j[k].call(a,i)}function P(a,b,c,d,e,f){var g,j,h=a[t],i=h.options.onMove;return g=v.createEvent("Event"),g.initEvent("move",!0,!0),g.to=b,g.from=a,g.dragged=c,g.draggedRect=d,g.related=e||b,g.relatedRect=f||b.getBoundingClientRect(),a.dispatchEvent(g),i&&(j=i.call(h,g)),j}function Q(a){a.draggable=!1}function R(){z=!1}function S(a,b){var c=a.lastElementChild,d=c.getBoundingClientRect();return(b.clientY-(d.top+d.height)>5||b.clientX-(d.right+d.width)>5)&&c}function T(a){for(var b=a.tagName+a.className+a.src+a.href+a.textContent,c=b.length,d=0;c--;)d+=b.charCodeAt(c);return d.toString(36)}function U(a,b){var c=0;if(!a||!a.parentNode)return-1;for(;a&&(a=a.previousElementSibling);)"TEMPLATE"!==a.nodeName.toUpperCase()&&V(a,b)&&c++;return c}function V(a,b){if(a){b=b.split(".");var c=b.shift().toUpperCase(),d=new RegExp("\\s("+b.join("|")+")(?=\\s)","g");return!(""!==c&&a.nodeName.toUpperCase()!=c||b.length&&((" "+a.className+" ").match(d)||[]).length!=b.length)}return!1}function W(a,b){var c,d;return function(){void 0===c&&(c=arguments,d=this,setTimeout(function(){1===c.length?a.call(d,c[0]):a.apply(d,c),c=void 0},b))}}function X(a,b){if(a&&b)for(var c in b)b.hasOwnProperty(c)&&(a[c]=b[c]);return a}if("undefined"==typeof window||"undefined"==typeof window.document)return function(){throw new Error("Sortable.js requires a window with a document")};var a,b,c,d,e,f,g,h,i,j,k,l,m,n,p,q,r,o={},s=/\s+/g,t="Sortable"+(new Date).getTime(),u=window,v=u.document,w=u.parseInt,x=!!("draggable"in v.createElement("div")),y=function(a){return a=v.createElement("x"),a.style.cssText="pointer-events:auto","auto"===a.style.pointerEvents}(),z=!1,A=Math.abs,C=([].slice,[]),D=W(function(a,b,c){if(c&&b.scroll){var d,e,n,p,f=b.scrollSensitivity,i=b.scrollSpeed,j=a.clientX,k=a.clientY,l=window.innerWidth,m=window.innerHeight;if(h!==c&&(g=b.scroll,h=c,g===!0)){g=c;do if(g.offsetWidth<g.scrollWidth||g.offsetHeight<g.scrollHeight)break;while(g=g.parentNode)}g&&(d=g,e=void 0==g.parentNode?g.document.body.getBoundingClientRect():g.getBoundingClientRect(),n=(A(e.right-j)<=f)-(A(e.left-j)<=f),p=(A(e.bottom-k)<=f)-(A(e.top-k)<=f)),n||p||(n=(l-j<=f)-(j<=f),p=(m-k<=f)-(k<=f),(n||p)&&(d=u)),o.vx===n&&o.vy===p&&o.el===d||(o.el=d,o.vx=n,o.vy=p,clearInterval(o.pid),d&&(o.pid=setInterval(function(){d===u?u.scrollTo(u.pageXOffset+n*i,u.pageYOffset+p*i):(p&&(d.scrollTop+=p*i),n&&(d.scrollLeft+=n*i))},24)))}},30),E=function(a){var b=a.group;b&&"object"==typeof b||(b=a.group={name:b}),["pull","put"].forEach(function(a){a in b||(b[a]=!0)}),a.groups=" "+b.name+(b.put.join?" "+b.put.join(" "):"")+" "};return F.prototype={constructor:F,_onTapStart:function(a){var b=this,c=this.el,d=this.options,e=a.type,f=a.touches&&a.touches[0],g=(f||a).target,h=g,i=d.filter;if(!("mousedown"===e&&0!==a.button||d.disabled)&&(g=H(g,d.draggable,c))){if(l=U(g,d.draggable),"function"==typeof i){if(i.call(this,a,g,this))return O(b,h,"filter",g,c,l),void a.preventDefault()}else if(i&&(i=i.split(",").some(function(a){if(a=H(h,a.trim(),c))return O(b,a,"filter",g,c,l),!0})))return void a.preventDefault();d.handle&&!H(h,d.handle,c)||this._prepareDragStart(a,f,g)}},_prepareDragStart:function(c,d,g){var l,h=this,i=h.el,j=h.options,k=i.ownerDocument;g&&!a&&g.parentNode===i&&(p=c,e=i,a=g,b=a.parentNode,f=a.nextSibling,n=j.group,a.style["will-change"]="transform",l=function(){h._disableDelayedDrag(),a.draggable=!0,L(a,h.options.chosenClass,!0),h._triggerDragStart(d)},j.ignore.split(",").forEach(function(b){N(a,b.trim(),Q)}),J(k,"mouseup",h._onDrop),J(k,"touchend",h._onDrop),J(k,"touchcancel",h._onDrop),j.delay?(J(k,"mouseup",h._disableDelayedDrag),J(k,"touchend",h._disableDelayedDrag),J(k,"touchcancel",h._disableDelayedDrag),J(k,"mousemove",h._disableDelayedDrag),J(k,"touchmove",h._disableDelayedDrag),h._dragStartTimer=setTimeout(l,j.delay)):l())},_disableDelayedDrag:function(){var a=this.el.ownerDocument;clearTimeout(this._dragStartTimer),K(a,"mouseup",this._disableDelayedDrag),K(a,"touchend",this._disableDelayedDrag),K(a,"touchcancel",this._disableDelayedDrag),K(a,"mousemove",this._disableDelayedDrag),K(a,"touchmove",this._disableDelayedDrag)},_triggerDragStart:function(b){b?(p={target:a,clientX:b.clientX,clientY:b.clientY},this._onDragStart(p,"touch")):this.nativeDraggable?(J(a,"dragend",this),J(e,"dragstart",this._onDragStart)):this._onDragStart(p,!0);try{v.selection?setTimeout(function(){v.selection.empty()}):window.getSelection().removeAllRanges()}catch(a){}},_dragStarted:function(){e&&a&&(L(a,this.options.ghostClass,!0),F.active=this,O(this,e,"start",a,e,l))},_emulateDragOver:function(){if(q){if(this._lastX===q.clientX&&this._lastY===q.clientY)return;this._lastX=q.clientX,this._lastY=q.clientY,y||M(c,"display","none");var a=v.elementFromPoint(q.clientX,q.clientY),b=a,d=" "+this.options.group.name,e=C.length;if(b)do{if(b[t]&&b[t].options.groups.indexOf(d)>-1){for(;e--;)C[e]({clientX:q.clientX,clientY:q.clientY,target:a,rootEl:b});break}a=b}while(b=b.parentNode);y||M(c,"display","")}},_onTouchMove:function(a){if(p){F.active||this._dragStarted(),this._appendGhost();var b=a.touches?a.touches[0]:a,d=b.clientX-p.clientX,e=b.clientY-p.clientY,f=a.touches?"translate3d("+d+"px,"+e+"px,0)":"translate("+d+"px,"+e+"px)";r=!0,q=b,M(c,"webkitTransform",f),M(c,"mozTransform",f),M(c,"msTransform",f),M(c,"transform",f),a.preventDefault()}},_appendGhost:function(){if(!c){var g,b=a.getBoundingClientRect(),d=M(a),f=this.options;c=a.cloneNode(!0),L(c,f.ghostClass,!1),L(c,f.fallbackClass,!0),M(c,"top",b.top-w(d.marginTop,10)),M(c,"left",b.left-w(d.marginLeft,10)),M(c,"width",b.width),M(c,"height",b.height),M(c,"opacity","0.8"),M(c,"position","fixed"),M(c,"zIndex","100000"),M(c,"pointerEvents","none"),f.fallbackOnBody&&v.body.appendChild(c)||e.appendChild(c),g=c.getBoundingClientRect(),M(c,"width",2*b.width-g.width),M(c,"height",2*b.height-g.height)}},_onDragStart:function(b,c){var f=b.dataTransfer,g=this.options;this._offUpEvents(),"clone"==n.pull&&(d=a.cloneNode(!0),M(d,"display","none"),e.insertBefore(d,a)),c?("touch"===c?(J(v,"touchmove",this._onTouchMove),J(v,"touchend",this._onDrop),J(v,"touchcancel",this._onDrop)):(J(v,"mousemove",this._onTouchMove),J(v,"mouseup",this._onDrop)),this._loopId=setInterval(this._emulateDragOver,50)):(f&&(f.effectAllowed="move",g.setData&&g.setData.call(this,f,a)),J(v,"drop",this),setTimeout(this._dragStarted,0))},_onDragOver:function(g){var l,m,o,h=this.el,p=this.options,q=p.group,s=q.put,u=n===q,v=p.sort;if(void 0!==g.preventDefault&&(g.preventDefault(),!p.dragoverBubble&&g.stopPropagation()),r=!0,n&&!p.disabled&&(u?v||(o=!e.contains(a)):n.pull&&s&&(n.name===q.name||s.indexOf&&~s.indexOf(n.name)))&&(void 0===g.rootEl||g.rootEl===this.el)){if(D(g,p,this.el),z)return;if(l=H(g.target,p.draggable,h),m=a.getBoundingClientRect(),o)return G(!0),void(d||f?e.insertBefore(a,d||f):v||e.appendChild(a));if(0===h.children.length||h.children[0]===c||h===g.target&&(l=S(h,g))){if(l){if(l.animated)return;w=l.getBoundingClientRect()}G(u),P(e,h,a,m,l,w)!==!1&&(a.contains(h)||(h.appendChild(a),b=h),this._animate(m,a),l&&this._animate(w,l))}else if(l&&!l.animated&&l!==a&&void 0!==l.parentNode[t]){i!==l&&(i=l,j=M(l),k=M(l.parentNode));var J,w=l.getBoundingClientRect(),x=w.right-w.left,y=w.bottom-w.top,A=/left|right|inline/.test(j.cssFloat+j.display)||"flex"==k.display&&0===k["flex-direction"].indexOf("row"),B=l.offsetWidth>a.offsetWidth,C=l.offsetHeight>a.offsetHeight,E=(A?(g.clientX-w.left)/x:(g.clientY-w.top)/y)>.5,F=l.nextElementSibling,I=P(e,h,a,m,l,w);if(I!==!1){if(z=!0,setTimeout(R,30),G(u),1===I||I===-1)J=1===I;else if(A){var K=a.offsetTop,L=l.offsetTop;J=K===L?l.previousElementSibling===a&&!B||E&&B:l.previousElementSibling===a||a.previousElementSibling===l?(g.clientY-w.top)/y>.5:L>K}else J=F!==a&&!C||E&&C;a.contains(h)||(J&&!F?h.appendChild(a):l.parentNode.insertBefore(a,J?F:l)),b=a.parentNode,this._animate(m,a),this._animate(w,l)}}}},_animate:function(a,b){var c=this.options.animation;if(c){var d=b.getBoundingClientRect();M(b,"transition","none"),M(b,"transform","translate3d("+(a.left-d.left)+"px,"+(a.top-d.top)+"px,0)"),b.offsetWidth,M(b,"transition","all "+c+"ms"),M(b,"transform","translate3d(0,0,0)"),clearTimeout(b.animated),b.animated=setTimeout(function(){M(b,"transition",""),M(b,"transform",""),b.animated=!1},c)}},_offUpEvents:function(){var a=this.el.ownerDocument;K(v,"touchmove",this._onTouchMove),K(a,"mouseup",this._onDrop),K(a,"touchend",this._onDrop),K(a,"touchcancel",this._onDrop)},_onDrop:function(g){var h=this.el,i=this.options;clearInterval(this._loopId),clearInterval(o.pid),clearTimeout(this._dragStartTimer),K(v,"mousemove",this._onTouchMove),this.nativeDraggable&&(K(v,"drop",this),K(h,"dragstart",this._onDragStart)),this._offUpEvents(),g&&(r&&(g.preventDefault(),!i.dropBubble&&g.stopPropagation()),c&&c.parentNode.removeChild(c),a&&(this.nativeDraggable&&K(a,"dragend",this),Q(a),a.style["will-change"]="",L(a,this.options.ghostClass,!1),L(a,this.options.chosenClass,!1),e!==b?(m=U(a,i.draggable),m>=0&&(O(null,b,"sort",a,e,l,m),O(this,e,"sort",a,e,l,m),O(null,b,"add",a,e,l,m),O(this,e,"remove",a,e,l,m))):(d&&d.parentNode.removeChild(d),a.nextSibling!==f&&(m=U(a,i.draggable),m>=0&&(O(this,e,"update",a,e,l,m),O(this,e,"sort",a,e,l,m)))),F.active&&(null!=m&&m!==-1||(m=l),O(this,e,"end",a,e,l,m),this.save()))),this._nulling()},_nulling:function(){(F.active===this||!F.active)&&(e=a=b=c=f=d=g=h=p=q=r=m=i=j=n=F.active=null)},handleEvent:function(b){var c=b.type;"dragover"===c||"dragenter"===c?a&&(this._onDragOver(b),I(b)):"drop"!==c&&"dragend"!==c||this._onDrop(b)},toArray:function(){for(var b,a=[],c=this.el.children,d=0,e=c.length,f=this.options;d<e;d++)b=c[d],H(b,f.draggable,this.el)&&a.push(b.getAttribute(f.dataIdAttr)||T(b));return a},sort:function(a){var b={},c=this.el;this.toArray().forEach(function(a,d){var e=c.children[d];H(e,this.options.draggable,c)&&(b[a]=e)},this),a.forEach(function(a){b[a]&&(c.removeChild(b[a]),c.appendChild(b[a]))})},save:function(){var a=this.options.store;a&&a.set(this)},closest:function(a,b){return H(a,b||this.options.draggable,this.el)},option:function(a,b){var c=this.options;return void 0===b?c[a]:(c[a]=b,void("group"===a&&E(c)))},destroy:function(){var a=this.el;a[t]=null,K(a,"mousedown",this._onTapStart),K(a,"touchstart",this._onTapStart),this.nativeDraggable&&(K(a,"dragover",this),K(a,"dragenter",this)),Array.prototype.forEach.call(a.querySelectorAll("[draggable]"),function(a){a.removeAttribute("draggable")}),C.splice(C.indexOf(this._onDragOver),1),this._onDrop(),this.el=a=null}},F.utils={on:J,off:K,css:M,find:N,is:function(a,b){return!!H(a,b,a)},extend:X,throttle:W,closest:H,toggleClass:L,index:U},F.create=function(a,b){return new F(a,b)},F.version="1.4.2",F});
/**
 * If update sortable library test:
 * – bug when inner content disappear in sortable while dragging
 * – errors in IE
 */

/**!
 * wp-color-picker-alpha
 *
 * Overwrite Automattic Iris for enabled Alpha Channel in wpColorPicker
 * Only run in input and is defined data alpha in true
 *
 * Version: 1.2.2
 * https://github.com/23r9i0/wp-color-picker-alpha
 * Copyright (c) 2015 Sergio P.A. (23r9i0).
 * Licensed under the GPLv2 license.
 */
!function(t){var o="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAAHnlligAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHJJREFUeNpi+P///4EDBxiAGMgCCCAGFB5AADGCRBgYDh48CCRZIJS9vT2QBAggFBkmBiSAogxFBiCAoHogAKIKAlBUYTELAiAmEtABEECk20G6BOmuIl0CIMBQ/IEMkO0myiSSraaaBhZcbkUOs0HuBwDplz5uFJ3Z4gAAAABJRU5ErkJggg==",i='<a tabindex="0" class="wp-color-result" />',e='<div class="wp-picker-holder" />',r='<div class="wp-picker-container" />',a='<input type="button" class="button button-small hidden" />';Color.fn.toString=function(){if(this._alpha<1)return this.toCSS("rgba",this._alpha).replace(/\s+/g,"");var t=parseInt(this._color,10).toString(16);return this.error?"":(t.length<6&&(t=("00000"+t).substr(-6)),"#"+t)},t.widget("wp.wpColorPicker",t.wp.wpColorPicker,{_create:function(){if(t.support.iris){var n=this,s=n.element;t.extend(n.options,s.data()),n.close=t.proxy(n.close,n),n.initialValue=s.val(),s.addClass("wp-color-picker").hide().wrap(r),n.wrap=s.parent(),n.toggler=t(i).insertBefore(s).css({backgroundColor:n.initialValue}).attr("title",wpColorPickerL10n.pick).attr("data-current",wpColorPickerL10n.current),n.pickerContainer=t(e).insertAfter(s),n.button=t(a),n.options.defaultColor?n.button.addClass("wp-picker-default").val(wpColorPickerL10n.defaultString):n.button.addClass("wp-picker-clear").val(wpColorPickerL10n.clear),s.wrap('<span class="wp-picker-input-wrap" />').after(n.button),s.iris({target:n.pickerContainer,hide:n.options.hide,width:n.options.width,mode:n.options.mode,palettes:n.options.palettes,change:function(i,e){n.options.alpha?(n.toggler.css({"background-image":"url("+o+")"}).html("<span />"),n.toggler.find("span").css({width:"100%",height:"100%",position:"absolute",top:0,left:0,"border-top-left-radius":"3px","border-bottom-left-radius":"3px",background:e.color.toString()})):n.toggler.css({backgroundColor:e.color.toString()}),t.isFunction(n.options.change)&&n.options.change.call(this,i,e)}}),s.val(n.initialValue),n._addListeners(),n.options.hide||n.toggler.click()}},_addListeners:function(){var o=this;o.wrap.on("click.wpcolorpicker",function(t){t.stopPropagation()}),o.toggler.on("click",function(){o.toggler.hasClass("wp-picker-open")?o.close():o.open()}),o.element.on("change",function(i){(""===t(this).val()||o.element.hasClass("iris-error"))&&(o.options.alpha?(o.toggler.removeAttr("style"),o.toggler.find("span").css("backgroundColor","")):o.toggler.css("backgroundColor",""),t.isFunction(o.options.clear)&&o.options.clear.call(this,i))}),o.toggler.on("keyup",function(t){13!==t.keyCode&&32!==t.keyCode||(t.preventDefault(),o.toggler.trigger("click").next().focus())}),o.button.on("click",function(i){t(this).hasClass("wp-picker-clear")?(o.element.val(""),o.options.alpha?(o.toggler.removeAttr("style"),o.toggler.find("span").css("backgroundColor","")):o.toggler.css("backgroundColor",""),t.isFunction(o.options.clear)&&o.options.clear.call(this,i)):t(this).hasClass("wp-picker-default")&&o.element.val(o.options.defaultColor).change()})}}),t.widget("a8c.iris",t.a8c.iris,{_create:function(){if(this._super(),this.options.alpha=this.element.data("alpha")||!1,this.element.is(":input")||(this.options.alpha=!1),"undefined"!=typeof this.options.alpha&&this.options.alpha){var o=this,i=o.element,e='<div class="iris-strip iris-slider iris-alpha-slider"><div class="iris-slider-offset iris-slider-offset-alpha"></div></div>',r=t(e).appendTo(o.picker.find(".iris-picker-inner")),a=r.find(".iris-slider-offset-alpha"),n={aContainer:r,aSlider:a};"undefined"!=typeof i.data("custom-width")?o.options.customWidth=parseInt(i.data("custom-width"))||0:o.options.customWidth=100,o.options.defaultWidth=i.width(),(o._color._alpha<1||-1!=o._color.toString().indexOf("rgb"))&&i.width(parseInt(o.options.defaultWidth+o.options.customWidth)),t.each(n,function(t,i){o.controls[t]=i}),o.controls.square.css({"margin-right":"0"});var s=o.picker.width()-o.controls.square.width()-20,l=s/6,c=s/2-l;t.each(["aContainer","strip"],function(t,i){o.controls[i].width(c).css({"margin-left":l+"px"})}),o._initControls(),o._change()}},_initControls:function(){if(this._super(),this.options.alpha){var t=this,o=t.controls;o.aSlider.slider({orientation:"vertical",min:0,max:100,step:1,value:parseInt(100*t._color._alpha),slide:function(o,i){t._color._alpha=parseFloat(i.value/100),t._change.apply(t,arguments)}})}},_change:function(){this._super();var t=this,i=t.element;if(this.options.alpha){var e=t.controls,r=parseInt(100*t._color._alpha),a=t._color.toRgb(),n=["rgb("+a.r+","+a.g+","+a.b+") 0%","rgba("+a.r+","+a.g+","+a.b+", 0) 100%"],s=t.options.defaultWidth,l=t.options.customWidth,c=t.picker.closest(".wp-picker-container").find(".wp-color-result");e.aContainer.css({background:"linear-gradient(to bottom, "+n.join(", ")+"), url("+o+")"}),c.hasClass("wp-picker-open")&&(e.aSlider.slider("value",r),t._color._alpha<1?(e.strip.attr("style",e.strip.attr("style").replace(/rgba\(([0-9]+,)(\s+)?([0-9]+,)(\s+)?([0-9]+)(,(\s+)?[0-9\.]+)\)/g,"rgb($1$3$5)")),i.width(parseInt(s+l))):i.width(s))}var p=i.data("reset-alpha")||!1;p&&t.picker.find(".iris-palette-container").on("click.palette",".iris-palette",function(){t._color._alpha=1,t.active="external",t._change()})},_addInputListeners:function(t){var o=this,i=100,e=function(i){var e=new Color(t.val()),r=t.val();t.removeClass("iris-error"),e.error?""!==r&&t.addClass("iris-error"):e.toString()!==o._color.toString()&&("keyup"===i.type&&r.match(/^[0-9a-fA-F]{3}$/)||o._setOption("color",e.toString()))};t.on("change",e).on("keyup",o._debounce(e,i)),o.options.hide&&t.on("focus",function(){o.show()})}})}(jQuery),jQuery(document).ready(function(t){t(".color-picker").wpColorPicker()});

/*
    JQuery Advanced News Ticker 1.0.11 (20/02/14)
    created by risq
    website (docs & demos) : http://risq.github.io/jquery-advanced-news-ticker/
*/
(function(b,k,l,m){function g(a,f){this.element=a;this.$el=b(a);this.options=b.extend({},c,f);this._defaults=c;this._name=d;this.moveInterval;this.moving=this.paused=this.state=0;(this.$el.is("ul")||this.$el.is("ol"))&&this.init()}var d="newsTicker",c={row_height:20,max_rows:3,speed:400,duration:2500,direction:"up",autostart:1,pauseOnHover:1,nextButton:null,prevButton:null,startButton:null,stopButton:null,hasMoved:function(){},movingUp:function(){},movingDown:function(){},start:function(){},stop:function(){},
pause:function(){},unpause:function(){}};g.prototype={init:function(){this.$el.height(this.options.row_height*this.options.max_rows).css({overflow:"hidden"});this.checkSpeed();this.options.nextButton&&"undefined"!==typeof this.options.nextButton[0]&&this.options.nextButton.click(function(a){this.moveNext();this.resetInterval()}.bind(this));this.options.prevButton&&"undefined"!==typeof this.options.prevButton[0]&&this.options.prevButton.click(function(a){this.movePrev();this.resetInterval()}.bind(this));
this.options.stopButton&&"undefined"!==typeof this.options.stopButton[0]&&this.options.stopButton.click(function(a){this.stop()}.bind(this));this.options.startButton&&"undefined"!==typeof this.options.startButton[0]&&this.options.startButton.click(function(a){this.start()}.bind(this));this.options.pauseOnHover&&this.$el.hover(function(){this.state&&this.pause()}.bind(this),function(){this.state&&this.unpause()}.bind(this));this.options.autostart&&this.start()},start:function(){this.state||(this.state=
1,this.resetInterval(),this.options.start())},stop:function(){this.state&&(clearInterval(this.moveInterval),this.state=0,this.options.stop())},resetInterval:function(){this.state&&(clearInterval(this.moveInterval),this.moveInterval=setInterval(function(){this.move()}.bind(this),this.options.duration))},move:function(){this.paused||this.moveNext()},moveNext:function(){"down"===this.options.direction?this.moveDown():"up"===this.options.direction&&this.moveUp()},movePrev:function(){"down"===this.options.direction?
this.moveUp():"up"===this.options.direction&&this.moveDown()},pause:function(){this.paused||(this.paused=1);this.options.pause()},unpause:function(){this.paused&&(this.paused=0);this.options.unpause()},moveDown:function(){this.moving||(this.moving=1,this.options.movingDown(),this.$el.children("li:last").detach().prependTo(this.$el).css("marginTop","-"+this.options.row_height+"px").animate({marginTop:"0px"},this.options.speed,function(){this.moving=0;this.options.hasMoved()}.bind(this)))},moveUp:function(){if(!this.moving){this.moving=
1;this.options.movingUp();var a=this.$el.children("li:first");a.animate({marginTop:"-"+this.options.row_height+"px"},this.options.speed,function(){a.detach().css("marginTop","0").appendTo(this.$el);this.moving=0;this.options.hasMoved()}.bind(this))}},updateOption:function(a,b){"undefined"!==typeof this.options[a]&&(this.options[a]=b,"duration"==a||"speed"==a)&&(this.checkSpeed(),this.resetInterval())},add:function(a){this.$el.append(b("<li>").html(a))},getState:function(){return paused?2:this.state},
checkSpeed:function(){this.options.duration<this.options.speed+25&&(this.options.speed=this.options.duration-25)},destroy:function(){this._destroy()}};b.fn[d]=function(a){var f=arguments;return this.each(function(){var c=b(this),e=b.data(this,"plugin_"+d),h="object"===typeof a&&a;e||c.data("plugin_"+d,e=new g(this,h));"string"===typeof a&&e[a].apply(e,Array.prototype.slice.call(f,1))})}})(jQuery,window,document);


/**
 * Mutation observer library written by Alexey Petlenko
 *
 * @author Alexey Petlenko(Massique)
 */

;(function(){

	'use strict';

	var observerClass = function(element, callback, config) {

		if ( ! window.MutationObserver ) {

			console.error('mq_mutation_obs:: Browser does not support mutations! Please, install IE11+ or update your current browser to newest version.' );
			return false;
		}

		if( ! element || typeof callback != 'function' || ( typeof config != 'object' && config ) ) {

			console.error('mq_mutation_obs:: invalid arguments in class constructor');
			return false;
		}

		// create an observer instance
		var observer = new MutationObserver(function(mutations) {

		    mutations.forEach(callback);
		});

		// configuration of the observer:
		var configFinal = config || { attributes: true, childList: true, characterData: true };

		// pass in the target node, as well as the observer options
		observer.observe(element, configFinal);

		return observer;
	}

	window.mqMutationObserver = observerClass;
}());
