/**
 * Created by IntelliJ IDEA.
 *
 * User: phil
 * Date: 15/11/12
 * Time: 11:04 AM
 *
 */(function(e){var t=this,n,r=!1,i=0,s=0,o=0,u=0,a,f,l=null,c=.95,h=0,p=1,d=.1,v=.1,m=function(e){s+=e;h+=(s-o)*p;o=s},g=function(){if(h<-d||h>d){i+=h;if(i>u)i=h=0;else if(i<a){h=0;i=a}n.scrollTop(-i);h*=c;l&&l()}},y=function(){if(!r)return;requestAnimFrame(y);g()},b=function(e){e.preventDefault();var t=e.originalEvent,r=t.detail?t.detail*-1:t.wheelDelta/40,s=r<0?-1:1;if(s!=f){h=0;f=s}i=-n.scrollTop();m(r)};window.requestAnimFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)}}();var w=function(){var e=[],t=null,n=30;return function(r){if(r==0)return r;if(t!=null)return r*t;var i=Math.abs(r);e:do{for(var s=0;s<e.length;++s)if(i<=e[s]){e.splice(s,0,i);break e}e.push(i)}while(!1);var o=n/e[Math.floor(e.length/3)];e.length==500&&(t=o);return r*o}}();e.fn.smoothWheel=function(){var t=jQuery.extend({},arguments[0]);return this.each(function(u,f){if(!("ontouchstart"in window)){n=e(this);n.bind("mousewheel",b);n.bind("DOMMouseScroll",b);s=o=n.get(0).scrollTop;i=-s;a=n.get(0).clientHeight-n.get(0).scrollHeight;t.onRender&&(l=t.onRender);if(t.remove){log("122","smoothWheel","remove","");r=!1;n.unbind("mousewheel",b);n.unbind("DOMMouseScroll",b)}else if(!r){r=!0;y()}}})}})(jQuery);