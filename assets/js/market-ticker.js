// ================== LIVE MARKET TICKER ==================
(function () {
  const tickerContent = document.getElementById("tickerContent");
  if (!tickerContent) return;

  async function fetchTickerData() {
    try {
      const response = await fetch('api/ticker.php');
      if (!response.ok) throw new Error("Network response was not ok");
      return await response.json();
    } catch (e) {
      console.warn("Ticker fetch failed:", e);
      return null;
    }
  }

  function renderTicker(data) {
    if (!data || !data.length) return;

    const itemsHTML = data
      .map((s) => {
        const isUp = s.change >= 0;
        const changeSign = isUp ? "+" : "";
        const changeClass = isUp ? "up" : "down";
        const arrow = isUp ? "▲" : "▼";

        const formattedPrice = typeof s.price === "number"
            ? s.price.toLocaleString(undefined, {
                minimumFractionDigits: s.type === "forex" ? 4 : 2,
                maximumFractionDigits: s.type === "forex" ? 4 : 2,
              })
            : s.price;

        const formattedChange = typeof s.change === "number"
            ? s.change.toFixed(s.type === "forex" ? 4 : 2)
            : s.change;
            
        const formattedPercent = typeof s.percent === "number"
            ? s.percent.toFixed(2)
            : s.percent;

        return `
                <div class="ticker-item" data-type="${s.type}">
                    <span class="ticker-symbol">${s.symbol}</span>
                    <span class="ticker-price">${formattedPrice}</span>
                    <span class="ticker-change ${changeClass}">${arrow} ${changeSign}${formattedChange} (${changeSign}${formattedPercent}%)</span>
                </div>
            `;
      })
      .join("");

    // Triple items for ultra-smooth seamless looping
    tickerContent.innerHTML = itemsHTML + itemsHTML + itemsHTML;
  }

  let offset = 0;
  let isPaused = false;
  let currentSpeed = 0.5;

  function animateTicker() {
    if (!isPaused) {
      offset += currentSpeed;
      // The total width of the triple content
      const totalWidth = tickerContent.scrollWidth;
      // We loop when we've scrolled exactly one third of the total width
      const thirdWidth = totalWidth / 3;
      
      if (offset >= thirdWidth) {
        offset = 0;
      }
      tickerContent.style.transform = `translateX(${-offset}px)`;
    }
    requestAnimationFrame(animateTicker);
  }

  tickerContent.addEventListener("mouseenter", () => isPaused = true);
  tickerContent.addEventListener("mouseleave", () => isPaused = false);

  async function init() {
    const data = await fetchTickerData();
    if (data) {
        renderTicker(data);
    }
    // Start animation loop
    requestAnimationFrame(animateTicker);
  }

  // Initial update
  init();

  // Update data every 3 minutes
  setInterval(async () => {
    const data = await fetchTickerData();
    if (data) {
        renderTicker(data);
    }
  }, 180000);

})();
