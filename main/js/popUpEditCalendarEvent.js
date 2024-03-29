async function popUpEventEdit(prevPopUp, event_id, event) {
  function removeEventBtnListener() {
    const removeEventBtn = document.querySelector('.popUpHeader i.fa-trash');
    const removeEventBtnClone = removeEventBtn.cloneNode(true);
    removeEventBtn.parentNode.replaceChild(removeEventBtnClone, removeEventBtn);
    removeEventBtnClone.querySelectorAll('*').forEach((node) => {
      const oldNode = node.cloneNode(true);
      node.parentNode.replaceChild(oldNode, node);
    });
  }

  const modalEditEvent = document.getElementById('popUpEditCalendarEvent');
  const closePopUpEventEdit = document.querySelector(
    '.popUpEditEventCalendar span.close'
  );
  const editEventBtn = document.querySelector('.popUpHeader i.fa-pen');

  function editEvent() {
    modalEditEvent.style.display = 'block';
    prevPopUp.style.display = 'none';
    editEventBtn.removeEventListener('click', editEvent);
    eventID = event_id;

    const eventTitleEdit = document.querySelector(
      '.popUpEditEventCalendar div.editEvent form input:nth-of-type(1)'
    );
    const eventDescriptionEdit = document.querySelector(
      '.popUpEditEventCalendar div.editEvent form textarea'
    );
    const eventLocationEdit = document.querySelector(
      '.popUpEditEventCalendar div.editEvent form input:nth-of-type(2)'
    );
    const eventDateEdit = document.querySelector(
      '.popUpEditEventCalendar div.editEvent form input:nth-of-type(3)'
    );
    const eventTimeEdit = document.querySelector(
      '.popUpEditEventCalendar div.editEvent form input:nth-of-type(4)'
    );
    const eventPriorityEdit = document.querySelector(
      '.popUpEditEventCalendar div.editEvent form select'
    );
    const eventColorEdit = document.querySelector(
      '.popUpEditEventCalendar div.editEvent form input[type="color"]'
    );

    eventTitleEdit.value = eventDetails[0].nazwa;
    eventDescriptionEdit.value = eventDetails[0].opis;
    eventLocationEdit.value = eventDetails[0].lokalizacja;
    eventDateEdit.value = eventDetails[0].data;
    eventTimeEdit.value = eventDetails[0].czas;
    eventPriorityEdit.value = eventDetails[0].priorytet;
    eventColorEdit.value = eventDetails[0].kolor;

    async function editEventValidation(e) {
      if (
        eventTitleEdit.value.length != 0 &&
        eventDateEdit.value.length != 0 &&
        eventTimeEdit.value.length != 0
      ) {
        e.preventDefault();
        let isExecuted = confirm(
          `Are you sure to edit this event named ${eventDetails[0].nazwa}?`
        );
        if (isExecuted) {
          await editListEventCalendar();
          eventTitleEdit.value = '';
          eventDescriptionEdit.value = '';
          eventLocationEdit.value = '';
          eventDateEdit.value = '';
          eventTimeEdit.value = '';
          eventPriorityEdit.value = '1';
          eventColorEdit.value = '#000000';
          modalEditEvent.style.display = 'none';
          document
            .querySelector('.popUpEditEventCalendar div.editEvent form button')
            .removeEventListener('click', editEventValidation);

          editEventBtn.removeEventListener('click', editEvent);
          removeEventBtnListener();

          await addEventBtnsRender();
          popUpAddEvent();
        }
      }
    }

    closePopUpEventEdit.addEventListener('click', function () {
      modalEditEvent.style.display = 'none';
      editEventBtn.removeEventListener('click', editEvent);
      document
        .querySelector('.popUpEditEventCalendar div.editEvent form button')
        .removeEventListener('click', editEventValidation);
      removeEventBtnListener();
    });

    window.addEventListener('mousedown', function (event) {
      if (event.target == modalEditEvent) {
        modalEditEvent.style.display = 'none';
        editEventBtn.removeEventListener('click', editEvent);
        document
          .querySelector('.popUpEditEventCalendar div.editEvent form button')
          .removeEventListener('click', editEventValidation);
        removeEventBtnListener();
      }
    });

    document
      .querySelector('.popUpEditEventCalendar div.editEvent form button')
      .addEventListener('click', editEventValidation);
  }

  editEventBtn.addEventListener('click', editEvent);
}
