$(function(){$("a.lightbox").fluidbox({loader:!0})});var swiper=new Swiper(".swiper-container",{pagination:".swiper-pagination",paginationClickable:!0,autoplay:7500,autoplayDisableOnInteraction:!1});$(document).ready(function(){function e(e){var t="";for(var i in e)t+=e[i];return t}var t=$(".grid").imagesLoaded(function(){t.isotope({itemSelector:".item",transitionDuration:"0.6s"})}),i={};$(".filter").on("click","button",function(){var n=$(this),o=n.parents(".filter-list"),a=o.attr("data-filter-group");i[a]=n.attr("data-filter");var c=e(i);t.isotope({filter:c})}),$(".filter-list").each(function(e,t){var i=$(t);i.on("click","button",function(){i.find(".checked").removeClass("checked"),$(this).addClass("checked")})});var n=$('input[name="files[]"]'),o=document.querySelector(".collection-total-count"),a=document.querySelector(".download-collection-button");n.change(function(){var e=$('input[name="files[]"]:checked').length,t=$(this).parent();t.toggleClass("border"),n.each(function(){$(o).html(e)}),e>0?(classie.add(o,"color"),classie.remove(a,"disabled"),$(a).on("click",function(){$('input[name="zipit"]').trigger("click")})):(classie.remove(o,"color"),classie.add(a,"disabled")),classie.add(o,"countAnim"),setTimeout(function(){classie.remove(o,"countAnim")},350)})});