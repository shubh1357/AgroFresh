// Simple Tour Bus

let Stops = [
  {
    id: "tour-user",
    title: "User Details",
    message: "Access your account details."
  },
  {
    id: "tour-logo",
    title: "This is the logo",
    message: "It's a great logo."
  },
  {
    id: "tour-action",
    title: "This is the action button",
    message: "Great stuff will happen when you click this."
  },
  {
    id: "tour-elements",
    title: "This is the elements button",
    message: "Elements are created on this page"
  },
  {
    id: "tour-card",
    title: "This is a card",
    message: "A simple card with simple details"
  },
  {
    id: "tour-table",
    title: "This is the name field",
    message: "User names are listed below"
  }
];

class TourBus {
  constructor(stops) {
    this.stops = stops;
    this.currentIndex = 0;
  }
  initOverlay = () => {
    // Overlay
    let overlay = document.createElement("div");
    overlay.classList.add("tour-overlay");
    document.body.append(overlay);
    // Remove on overlay click
    overlay.addEventListener("click", this.destory);
    this.overlay = overlay;
  };
  initStopBg = () => {
    // Stop Background
    let stopBg = document.createElement("div");
    stopBg.classList.add("tour-stop-bg");
    document.body.append(stopBg);
    this.stopBg = stopBg;
  };
  initStopMessage = () => {
    // Stop Message
    let stopMessage = document.createElement("div");
    stopMessage.classList.add("tour-message");
    document.body.append(stopMessage);
    stopMessage.innerHTML = `
      <small class="status">-</small>
      <h1 class="title">Title</h1>
      <p class="message">Message</p>
      <div class="tour-message__controls">
        <button class="back">👈</button>
        <button class="next">👉</button>
        <button class="close">👋</button>
      </div>
    `;
    let nextBtn = stopMessage.querySelector(".next");
    nextBtn.addEventListener("click", this.next);
    let backBtn = stopMessage.querySelector(".back");
    backBtn.addEventListener("click", this.back);
    let closeBtn = stopMessage.querySelector(".close");
    closeBtn.addEventListener("click", this.destory);
    this.stopMessage = stopMessage;
  };
  start = () => {
    // Key take away: Fixed background w/correct zindex need
    this.initOverlay();
    // Key take away: White Background needs to be faked
    this.initStopBg();
    this.initStopMessage();
    window.addEventListener("resize", this.updateStop);
    window.addEventListener("scroll", this.updateStop);

    this.moveToStop(0);
  };
  next = () => {
    this.moveToStop(1);
  };
  back = () => {
    this.moveToStop(-1);
  };
  destory = () => {
    // Remove overlay
    this.overlay.remove();
    // Remove stop background
    this.stopBg.remove();
    // Remove message
    this.stopMessage.remove();
    // Remove Class from Current Stop
    if (this.currentStopElm) {
      this.currentStopElm.classList.remove("tour-stop");
    }

    // Reset Index to 0
    this.currentIndex = 0;

    // Remove Event Listeners
    window.removeEventListener("resize", this.updateStop);
    window.removeEventListener("scroll", this.updateStop);
  };
  // direction: 1 | -1 | 0
  moveToStop = direction => {
    // Remove Class from Current Stop
    if (this.currentStopElm) {
      this.currentStopElm.classList.remove("tour-stop");
    }
    // Increase Stop Index Count
    this.currentIndex = this.currentIndex + direction;

    if (!this.stops[this.currentIndex]) {
      this.currentIndex = direction > 0 ? 0 : this.stops.length - 1;
    }

    // Find Node Location and Set
    this.currentStopElm = document.getElementById(
      this.stops[this.currentIndex].id
    );

    this.currentStopElm.classList.add("tour-stop");

    this.updateStop();
  };
  updateStop = () => {
    if (!this.currentStopElm) return;
    let style = this.currentStopElm.getBoundingClientRect();
    let currentStop = this.stops[this.currentIndex];

    this.updateStopBg(style);
    this.updateMessageText(currentStop);
    this.updateMessagePosition(style);
  };
  // getBoundingClientRect styles
  updateStopBg = style => {
    this.stopBg.style.top = style.top + "px";
    this.stopBg.style.left = style.left + "px";
    this.stopBg.style.width = style.width + "px";
    this.stopBg.style.height = style.height + "px";
  };
  // Stop format - id, title, message
  updateMessageText = currentStop => {
    // Update Text
    let title = this.stopMessage.querySelector(".title");
    let message = this.stopMessage.querySelector(".message");
    let status = this.stopMessage.querySelector(".status");

    title.textContent = currentStop.title;
    message.textContent = currentStop.message;
    status.textContent = `${this.currentIndex + 1} of ${this.stops.length}`;
  };
  // getBoundingClientRect styles
  updateMessagePosition = style => {
    // Location for Message
    let wWidth = window.innerWidth;
    let wHeight = window.innerHeight;

    let top,
      left,
      bottom,
      right,
      messageHeight = this.stopMessage.offsetHeight,
      messageWidth = this.stopMessage.offsetWidth;

    // Right Position
    top = style.top + style.height / 2 - messageHeight / 2;
    left = style.left + style.width + 40;

    bottom = top + messageHeight;
    right = left + messageWidth;

    // If window width is larger than right side
    // And widow height is larger than bottom
    if (wWidth > right && wHeight > bottom) {
      this.stopMessage.style.top = (top > 0 ? top : 20) + "px";
      this.stopMessage.style.left = left + "px";
      return;
    }

    // Bottom Position
    top = style.bottom + 40;
    left = style.left + style.width / 2 - messageWidth / 2;

    bottom = top + messageHeight;
    right = left + messageWidth;

    // If window width is larger than right side
    // And widow height is larger than bottom
    if (wWidth > right && wHeight > bottom) {
      this.stopMessage.style.top = top + "px";
      this.stopMessage.style.left = (left > 0 ? left : 20) + "px";
      return;
    }

    // Left Position
    top = style.top + style.height / 2 - messageHeight / 2;
    left = style.left - messageWidth - 40;

    bottom = top + messageHeight;
    right = left + messageWidth;

    if (wWidth > right && wHeight > bottom) {
      this.stopMessage.style.top = (top > 0 ? top : 20) + "px";
      this.stopMessage.style.left = left + "px";
      return;
    }

    // Top Position
    top = style.top - messageHeight - 40;
    left = style.left + style.width / 2 - messageWidth / 2;

    bottom = top + messageHeight;
    right = left + messageWidth;

    if (wWidth > right && top > 0) {
      this.stopMessage.style.top = top + "px";
      this.stopMessage.style.left = (left > 0 ? left : 20) + "px";
      return;
    }
  };
}

const pageTour = new TourBus(Stops);
pageTour.start();

// New Tour Action
const newTour = document.getElementById("start-tour");
newTour.addEventListener("click", pageTour.start);
