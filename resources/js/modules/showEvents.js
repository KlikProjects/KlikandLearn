const getAllEvLink = document.querySelector('.allEv-link');
const getMyEvLink = document.querySelector('.myEv-link');
const getPastEvLink = document.querySelector('.pastEv-link');

const getSectionAll = document.querySelector('.allEvents');
const getSectionMyEv = document.querySelector('.myEvents');
const getSectionPast = document.querySelector('.pastEvents');

getAllEvLink.addEventListener('click', showAllEvents);
getMyEvLink.addEventListener('click', showMyEvents);
getPastEvLink.addEventListener('click', showPastEvents);

function showAllEvents() {
    getSectionAll.classList.remove('hide');
    getSectionMyEv.classList.add('hide');
    getSectionPast.classList.add('hide');
}

function showMyEvents() {
    getSectionAll.classList.add('hide');
    getSectionMyEv.classList.remove('hide');
    getSectionPast.classList.add('hide');
}

function showPastEvents() {
    getSectionAll.classList.add('hide');
    getSectionMyEv.classList.add('hide');
    getSectionPast.classList.remove('hide');
}