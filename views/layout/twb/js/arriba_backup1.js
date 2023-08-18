$(document).ready(function(){
    $('.ir-arriba').click(function(){
        $('body, html').animate({
            scrollTop: '0px'
        }, 300);
    });
    
    $(window).scroll(function(){
        if( $(this).scrollTop() >0 ){
            $('.ir-arriba').slideDown(300);
        }else{
            $('.ir-arriba').slideUp(300);
        }
    });
});

//submenu 3 niveles
var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
var dropdownSubmenuElementList = [].slice.call(document.querySelectorAll('.dropdown-submenu-toggle'));
var dropdownMenus = [].slice.call(document.querySelectorAll('.dropdown-menu'));

var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
  return new bootstrap.Dropdown(dropdownToggleEl);
});

//no tiene para cerrarse si volvemos a presionar el submenu
var submenuList = dropdownSubmenuElementList.map(function (e) {
  e.onclick = function (e) {
      
    //elimino de todos los elementos coincidentes la clase show
    //1. los localizo y los almaceno en el array valor
    var valor = e.target.parentNode.parentNode.querySelectorAll('li.dropdown-submenu ul.dropdown-menu');
    //2. recorro el array y remuevo la clase show individualmente
    for (let i = 0; i < valor.length; i++) {
      valor[i].classList.remove('show');
    }
    //3. como ninguno posee la clase show a este nivel de hermandad, se agrega al único elemento la clase show
    e.target.parentNode.querySelector('ul').classList.toggle('show');
    
    e.stopPropagation();
    e.preventDefault();
  };
  //e.find('ul.dropdown-submenu').css( "background-color", "red" );
});

var masterClickEvent = document.addEventListener('click', function (e) {

  // Function to remove show class from dropdowns that are open
  closeAllSubmenus();

  // Hamburger menu
  if (e.target.classList.contains('hamburger-toggle')) {
    e.target.children[0].classList.toggle('active');
  }

});

function closeAllSubmenus() {
  // Function to remove show class from dropdowns that are open
  dropdownMenus.map(function (menu) {
    menu.classList.remove('show');
  });
}