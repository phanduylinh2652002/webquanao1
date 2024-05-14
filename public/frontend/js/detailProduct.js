window.addEventListener('scroll', function() {
    var fixedElement = document.querySelector('.product_details');
    var scrollHeight = Math.max(
        document.documentElement.scrollHeight,
        document.body.scrollHeight
      );
      
      var scrollTop = Math.max(
        document.documentElement.scrollTop,
        document.body.scrollTop
      );
      
      var windowHeight = window.innerHeight;
      
      var scrollLength = scrollHeight - windowHeight - scrollTop;
      if(scrollLength < 500){
        fixedElement.classList.remove('position-fixed');
        fixedElement.classList.add('position-sticky');
      }
      else{
        fixedElement.classList.add('position-fixed');
        fixedElement.classList.remove('position-sticky');

      }
  });