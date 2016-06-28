$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

/* Para o modal full */
/*! bootstrap-modal-carousel 2014-03-07 */
(function(factory) {
    "use strict";
    if (typeof define === "function" && define.amd) {
        define([ "jquery", "bootstrap" ], factory);
    } else {
        factory(window.jQuery);
    }
})(function($) {
    "use strict";
    $.extend($.fn.carousel.Constructor.prototype, {
        fit: function(height) {
            if (!height) {
                height = $(".item.active", this.$element).height();
            }
            if (height != this.$element.height()) {
                if ($.support.transition) {
                    this.$element.animate({
                        height: height
                    });
                } else {
                    this.$element.height(height);
                }
                this.$element.trigger($.Event("fit.bs.carousel", {
                    height: height
                }));
            }
            if (this.$element.find(".item.active img").length == 1) {
                var $img = this.$element.find(".item.active img"), pos = {
                    left: $img.position().left,
                    right: $img.position().left
                };
                if ($.support.transition) {
                    this.$element.find(".carousel-caption").animate(pos);
                } else {
                    this.$element.find(".carousel-caption").css(pos);
                }
            }
        }
    });
    $(document).on("slide.bs.carousel", ".carousel.carousel-fit", function(event) {
        var data = $(this).data("bs.carousel");
        data.$element.height($(".item.active", data.$element).height());
        var $next = $(".item.active", data.$element)[event.direction == "left" ? "next" : "prev"]();
        if (!$next.length) {
            $next = $(".item:" + (event.direction == "left" ? "first" : "last") + "-child", data.$element);
        }
        var height;
        height = $next.height();
        data.fit(height);
    }).on("slid.bs.carousel", ".carousel.carousel-fit", function(event) {
        var data = $(this).data("bs.carousel");
        data.fit();
    });
});

(function(factory) {
    "use strict";
    if (typeof define === "function" && define.amd) {
        define([ "jquery", "bootstrap" ], factory);
    } else {
        factory(window.jQuery);
    }
})(function($) {
    "use strict";
    function updateCarouselTopMargin($carousel, height) {
        if (!height) {
            height = $carousel.height();
        }
        var $parent = $carousel.parents(".modal:first"), needHeadingHandle = !$parent.hasClass("force-fullscreen"), parentFreeSpace = $parent.height();
        if (needHeadingHandle) {
            parentFreeSpace = parentFreeSpace - $(".modal-header", $parent).height();
            parentFreeSpace = parentFreeSpace - $(".modal-footer", $parent).height();
        }
        if ($.support.transition && $carousel.hasClass("slide")) {
            $carousel.animate({
                marginTop: (parentFreeSpace - height) / 2
            });
        } else {
            $carousel.css({
                marginTop: (parentFreeSpace - height) / 2
            });
        }
    }
    $(document).on("shown.bs.modal", ".modal", function(event) {
        if ($(".carousel", this).length) {
            $(".carousel", this).data("bs.carousel").fit();
        }
    }).on("shown.bs.modal", ".modal.modal-fullscreen", function(event) {
        if ($(".carousel", this).length) {
            updateCarouselTopMargin($(".carousel", this).data("bs.carousel").$element);
        }
    }).on("fit.bs.carousel", ".modal.modal-fullscreen .carousel", function(event) {
        updateCarouselTopMargin($(this).data("bs.carousel").$element, event.height);
    }).on("replaced.bs.local", ".carousel", function(event) {
        $(this).css("margin-top", 0);
        if ($(this).hasClass("carousel-fit")) {
            $(this).data("bs.carousel").fit();
        }
    });
});

(function(factory) {
    "use strict";
    if (typeof define === "function" && define.amd) {
        define([ "jquery", "bootstrap" ], factory);
    } else {
        factory(window.jQuery);
    }
})(function($) {
    "use strict";
    $.extend($.fn.modal.Constructor.prototype, {
        local: function(selector) {
            this.options.local = selector;
        },
        detach: function() {
            $(this.options.local).trigger($.Event("detach.bs.local"));
            if (!this.$placeholder) {
                this.$placeholder = $("<div></div>").addClass("hidden").html(this.$element.find(".modal-body").html()).insertBefore($(this.options.local));
            }
            this.$local = $(this.options.local).detach();
            this.$element.find(".modal-body").empty().append(this.$local);
            $(this.options.local).trigger($.Event("detached.bs.local"));
        },
        replace: function() {
            $(this.options.local).trigger($.Event("replace.bs.local"));
            this.$local.detach().insertAfter(this.$placeholder);
            this.$element.find(".modal-body").html(this.$placeholder.html());
            $(this.options.local).trigger($.Event("replaced.bs.local"));
        }
    });
    $(document).on("show.bs.modal", ".modal", function() {
        var data = $(this).data("bs.modal");
        if (data.options.local) {
            data.detach();
        }
    }).on("hidden.bs.modal", ".modal", function() {
        var data = $(this).data("bs.modal");
        if (data.options.local) {
            data.replace();
        }
    }).on("click.bs.modal.data-api", '[data-toggle="modal"][data-local]', function(event) {
        $($(this).attr("data-target")).modal("local", $(this).data("local"));
    });
});

/*  Função para adcionar e remover comanda  */

$(document).ready(function(){
var divPai = $('.Linha');
var btnCriar = $('#criarLinha');
 
btnCriar.click(function(){
//    divPai.append("<div class='textoBox' style='display:table-cell;width:99%'>div texto</div>");
//    divPai.append("<div class='mostraBox' style='display:table-cell;width:20px;vertical-align:middle;'>div mostra</div>");
//    divPai.append("<div class='mudarBox' style='display:table-cell;width:20px;vertical-align:middle;'>div mudar</div>");
//    divPai.append("<div class='excluirBox' style='display:table-cell;width:20px;vertical-align:middle;'>div excluir</div>");

divPai.append("");
    
});
 
});


/*  Função para adcionar e remover item  */



(function($) {

  RemoveTableRow = function(handler) {
    var tr = $(handler).closest('tr');

    tr.fadeOut(400, function(){ 
      tr.remove(); 
    }); 

    return false;
  };
  
  AddTableRow = function() {
      
      var newRow = $("<tr>");
      var cols = "";
        
        cols += '<td><input class="form-control" type="text" name="CODPEDIDO">';
        cols += '<td><input class="form-control" type="text" name="QUANTIDADE"></td>';
        cols += '<td><input class="form-control" type="text" name="HORARIO"></td>';
        cols += '<td><select class="form-control" name="STATUS">';
        cols += '<option value="fechado" name="fechado">FECHADO</option>';
        cols += '<option value="aberto" name="aberto">ABERTO</option>';
        cols += '</select></td>';
        cols += '<td><input class="form-control" type="text" name="VALOR"></td>';
        cols += '<td><input class="form-control" type="text" name="PRODUTO"></td>';
        cols += '<td class="actions">';
        cols += '<button class="btn btn-large btn-danger" onclick="RemoveTableRow(this)" type="button">Remover</button>';
        cols += '</td>';
      
      newRow.append(cols);
      
      $("#pedidos-table").append(newRow);
    
      return false;
  };
  

})(jQuery);