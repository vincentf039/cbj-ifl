document.addEventListener("DOMContentLoaded", () => {
  $('#freelancer-section-cards').slick({
    dots: true,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          dots: true
        }
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  // to close the button div when user clicked outside the div
  const btnFade = (btn, div) => {
    document.addEventListener('click', (e) => {
      const target = e.target
      const isClickInside = btn.contains(target);
      const isOpen = div.classList.contains('open');
  
      if(!isClickInside && isOpen) {
        div.classList.remove('open');
        div.classList.add('close');
  
        setTimeout( () => {
          div.classList.remove('close');
        }, 300);
      }
    });
  };

  // to stop the div from closing when the user clicked inside the button div
  const clickedInsideDiv = (div) => {
    div.addEventListener('click', (e) => {
      e.stopPropagation();
    });
  };

  // to close and open the div
  const openClose = (btn, div) => {
    btn.addEventListener('click', () => {
      const isOpen = div.classList.contains('open');
  
      if(isOpen) {
        div.classList.remove('open');
        div.classList.add('close');
  
        setTimeout(() => {
          div.classList.remove('close');
        }, 300);
      } else {
        div.classList.toggle('open');
      }
    });
  };

  // notification button
  const notification = document.querySelector('#notification');
  const notificationBtn = document.querySelector('#header .right-side .notifications .notification-btn');
  btnFade(notification, notificationBtn);
  clickedInsideDiv(notificationBtn);
  openClose(notification, notificationBtn);

  // messages button
  const messages = document.querySelector('#messages');
  const messagesBtn = document.querySelector('#header .right-side .notifications .messages-btn');
  btnFade(messages, messagesBtn);
  clickedInsideDiv(messagesBtn);
  openClose(messages, messagesBtn);

  // user button
  const user = document.querySelector('#user');
  const userBtn = document.querySelector('#header .right-side .user .user-btn');
  btnFade(user, userBtn);
  clickedInsideDiv(userBtn);
  openClose(user, userBtn);

});