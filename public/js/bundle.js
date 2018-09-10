function App() {
  this.bodyElem = $("body"), this.init()
}
this.templates = this.templates || {}, this.templates._footer = Handlebars.template({
  1: function(e, t, i, n) {
      var o = this.lambda,
          a = this.escapeExpression;
      return '\t\t\t\t\t<li><a href="' + a(o(null != e ? e.link : e, e)) + '">' + a(o(null != e ? e.title : e, e)) + "</a></li>\n"
  },
  compiler: [6, ">= 2.0.0-beta.1"],
  main: function(e, t, i, n) {
      var o;
      return this.escapeExpression(this.lambda(null != (o = null != e ? e.footer : e) ? o.crafted : o, e)) + "</p>\n\t\t</div>\n\t\t<div>\n\t\t\t<ul>\n" + (null != (o = t.each.call(e, null != (o = null != e ? e.footer : e) ? o.links : o, {
          name: "each",
          hash: {},
          fn: this.program(1, n, 0),
          inverse: this.noop,
          data: n
      })) ? o : "")
  },
  useData: !0
}), App.prototype.init = function() {
  $(window).width() < 930 ? this.isMobile = !0 : this.isMobile = !1, this.bindEvents(), this.launchAnimations()
}, App.prototype.bindEvents = function() {
  this.header = $("header"), this.burgerMenu = $("header > .mobile > .burger > .bars"), this.mobileMenu = $("header > .mobile-dropdown"), this.mobileMenuLogin = $("header > .mobile > .link"), this.burgerMenu.bind("click", $.proxy(this.toggleMobileMenu, this)), $(window).bind("resize", $.proxy(this.onResize, this))
}, App.prototype.launchAnimations = function() {
  this.bodyElem.hasClass("home") && $.proxy(this.homeAnims(), this), TweenMax.fromTo("body", .8, {
      backgroundColor: "#FFF"
  }, {
      backgroundColor: "#f6f6f6"
  })
}, App.prototype.onResize = function() {
  $(window).width() < 930 ? this.isMobile = !0 : this.isMobile = !1
}, App.prototype.toggleMobileMenu = function() {
  this.burgerMenu.parent().hasClass("active") ? (this.burgerMenu.parent().removeClass("active"), this.mobileMenu.removeClass("active"), this.mobileMenuLogin.addClass("active")) : (this.burgerMenu.parent().addClass("active"), this.mobileMenu.addClass("active"), this.mobileMenuLogin.removeClass("active"))
}, App.prototype.homeAnims = function() {
  var e = new ScrollMagic.Controller,
      t = "208px";
  this.isMobile && (t = "180px");
  var i = (new TimelineMax).staggerTo("#intro span", .6, {
      opacity: 1,
      y: "0px",
      ease: Elastic.easeOut.config(1, 1.14),
      force3D: !0
  }, .12).to(".catchPhrase span:first-child", 1, {
      y: "0px",
      scale: 1,
      rotation: "0deg",
      transformOrigin: "center center",
      opacity: 1,
      ease: Elastic.easeOut.config(1, .7)
  }, "-=0.77").to(".catchPhrase span:nth-child(2)", 1, {
      y: "0px",
      scale: 1,
      rotation: "0deg",
      transformOrigin: "center center",
      opacity: 1,
      ease: Elastic.easeOut.config(1, 1)
  }, "-=0.9").to(".centeredContainer .catchCta .cta--invite", .9, {
      y: "0px",
      width: t,
      scale: 1,
      rotation: "0deg",
      transformOrigin: "center center",
      opacity: 1,
      ease: Elastic.easeOut.config(1.2, .7)
  }, "-=0.9").staggerTo(".block", 1.2, {
      y: "0px",
      scale: 1,
      rotation: "0deg",
      transformOrigin: "center center",
      opacity: 1,
      ease: Elastic.easeOut.config(1.2, .7)
  }, .1, "-=0.9");
  new ScrollMagic.Scene({
      triggerElement: ".page.home",
      triggerHook: 1
  }).setTween(i).addTo(e)
};
var App = new App;

$(function() {
  $(".preloader").fadeOut();
});