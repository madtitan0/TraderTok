"use strict";
const fs = require("fs");
const path = require("path");

const flat = {
  "hero.badge": "Asset Information",
  "hero.title": "CRYPTOCURRENCY & EQUITY ASSET INFORMATION",
  "hero.p1":
    "This page provides an educational overview of selected cryptocurrency and equity assets available on the TraderTok platform. It is designed to help traders understand core characteristics, market drivers, and common risks linked to these instruments.",
  "hero.p2":
    "The aim is to make asset information clearer, more consistent, and easier to review before users engage with the wider trading environment.",

  "labels.overview": "Overview",
  "labels.keyMarketCharacteristics": "Key Market Characteristics",
  "labels.marketDevelopment": "Market Development",
  "labels.keyMarketDrivers": "Key Market Drivers",
  "labels.riskConsiderations": "Risk Considerations",

  "crypto.sectionTitle": "Cryptocurrency Assets",
  "crypto.sectionSubtitle":
    "Digital assets with different use cases, adoption drivers, and volatility profiles",

  "crypto.btc.title": "Bitcoin (BTC)",
  "crypto.btc.overview":
    "Bitcoin is a decentralized digital asset introduced in 2009. It operates on a blockchain network that enables peer-to-peer transactions without a central authority and is often regarded as a store-of-value asset because of its limited supply.",
  "crypto.btc.kmHtml":
    "<li>Asset Type: Cryptocurrency</li><li>Consensus Mechanism: Proof-of-Work</li><li>Maximum Supply: 21 million BTC</li><li>Primary Use: Digital payments and store of value</li>",
  "crypto.btc.md":
    "Bitcoin has experienced multiple market cycles, including major growth phases in 2013, 2017, and 2020-2025, supported by increasing institutional adoption and global recognition.",
  "crypto.btc.kdHtml":
    "<li>Institutional adoption</li><li>Macroeconomic conditions and liquidity</li><li>Regulatory developments</li><li>Bitcoin halving events</li>",
  "crypto.btc.risk":
    "Bitcoin is highly volatile and may experience rapid price fluctuations. Market sentiment, regulatory changes, and technological developments can significantly affect valuation.",

  "crypto.eth.title": "Ethereum (ETH)",
  "crypto.eth.overview":
    "Ethereum is a decentralized blockchain platform launched in 2015 that enables smart contracts and decentralized applications. It operates on a proof-of-stake consensus mechanism.",
  "crypto.eth.kmHtml":
    "<li>Asset Type: Cryptocurrency</li><li>Consensus Mechanism: Proof-of-Stake</li><li>Primary Use: Smart contracts, DeFi, and blockchain applications</li>",
  "crypto.eth.md":
    "Ethereum expanded alongside decentralized finance and blockchain ecosystems, especially during the 2017-2018 and 2020-2021 cycles.",
  "crypto.eth.kdHtml":
    "<li>Growth of DeFi ecosystems</li><li>Adoption of smart contracts</li><li>Network upgrades and scalability improvements</li><li>Developer and institutional activity</li>",
  "crypto.eth.risk":
    "Ethereum may be affected by network congestion, competition from alternative blockchains, regulatory changes, and broader market volatility.",

  "crypto.shib.title": "Shiba Inu (SHIB)",
  "crypto.shib.overview":
    "Shiba Inu is a cryptocurrency token launched in 2020 on the Ethereum blockchain. It is commonly categorized as a meme or community-driven asset.",
  "crypto.shib.kmHtml":
    "<li>Asset Type: Cryptocurrency Token</li><li>Blockchain: Ethereum (ERC-20)</li><li>Primary Use: Community ecosystem and speculative trading</li>",
  "crypto.shib.md":
    "SHIB gained significant attention during the 2021 crypto cycle, largely driven by community participation and social media momentum.",
  "crypto.shib.kdHtml":
    "<li>Market sentiment and hype cycles</li><li>Social media influence</li><li>Community-driven developments</li><li>Ecosystem expansion</li>",
  "crypto.shib.risk":
    "Meme tokens are highly speculative and may experience extreme volatility. Price movements are often driven more by sentiment than by fundamentals.",

  "equity.sectionTitle": "Equity Assets",
  "equity.sectionSubtitle":
    "Public companies shaped by earnings, innovation, macro conditions, and sector competition",

  "equity.tsla.title": "Tesla, Inc. (TSLA)",
  "equity.tsla.overview":
    "Tesla is a publicly traded company focused on electric vehicles, renewable energy, and battery technology, listed on the NASDAQ exchange.",
  "equity.tsla.kmHtml":
    "<li>Asset Type: Public Equity</li><li>Industry: Electric Vehicles & Clean Energy</li><li>Exchange: NASDAQ</li>",
  "equity.tsla.md":
    "Tesla has experienced significant growth alongside broader global EV adoption and continued innovation in energy solutions.",
  "equity.tsla.kdHtml":
    "<li>EV demand and adoption</li><li>Technological advancements</li><li>Battery innovation</li><li>Macroeconomic conditions</li>",
  "equity.tsla.risk":
    "Tesla's share price may be affected by earnings performance, competition, regulatory changes, and wider market trends.",

  "equity.aapl.title": "Apple Inc. (AAPL)",
  "equity.aapl.overview":
    "Apple is a global technology company focused on consumer electronics, software, and digital services.",
  "equity.aapl.kmHtml":
    "<li>Asset Type: Public Equity</li><li>Industry: Consumer Technology</li><li>Exchange: NASDAQ</li>",
  "equity.aapl.md":
    "Apple has demonstrated long-term growth through strong global demand and a diversified ecosystem of products and services.",
  "equity.aapl.kdHtml":
    "<li>Consumer demand for devices</li><li>Growth of services revenue</li><li>Product innovation</li><li>Supply chain and macroeconomic conditions</li>",
  "equity.aapl.risk":
    "Apple's performance may be affected by product cycles, global demand shifts, supply chain disruptions, and competitive pressure.",

  "equity.nio.title": "NIO Inc. (NIO)",
  "equity.nio.overview":
    "NIO is a China-based electric vehicle manufacturer known for premium EV offerings and battery-swapping technology.",
  "equity.nio.kmHtml":
    "<li>Asset Type: Public Equity</li><li>Industry: Electric Vehicles</li><li>Exchange: NYSE</li>",
  "equity.nio.md":
    "NIO has shown significant volatility since its IPO, influenced by rapid EV-sector growth and changing market expectations.",
  "equity.nio.kdHtml":
    "<li>EV adoption trends</li><li>Government incentives</li><li>Battery innovation</li><li>Competitive landscape</li>",
  "equity.nio.risk":
    "NIO is subject to high volatility due to competition, regulatory factors, and changing market conditions.",

  "risk.title": "General Risk Disclosure",
  "risk.h2": "Important information before trading cryptocurrencies or equities",
  "risk.listHtml":
    "<li>Trading in financial instruments, including cryptocurrencies and equities, involves a high level of risk and may not be suitable for all investors.</li><li>Prices can be highly volatile and unpredictable.</li><li>Leverage can amplify both gains and losses.</li><li>Market conditions can change rapidly due to economic, political, or regulatory events.</li><li>Past performance is not indicative of future results.</li><li>You should only trade with funds you can afford to lose and consider seeking independent financial advice before making investment decisions.</li>",

  "notice.title": "Important Notice",
  "notice.h2": "Educational information only",
  "notice.p":
    "This material is provided for educational and informational purposes only and does not constitute investment advice, financial advice, or a recommendation to buy or sell any financial instrument.",

  "meta.pageTitle": "Top Instruments & Asset Information | TraderTok",
  "meta.pageDescription":
    "Educational overview of selected cryptocurrency and equity instruments on TraderTok: characteristics, market context, and risk considerations.",
};

const out = path.join(__dirname, "top-instruments-flat", "en.json");
fs.mkdirSync(path.dirname(out), { recursive: true });
fs.writeFileSync(out, JSON.stringify(flat, null, 2) + "\n", "utf8");
console.log("wrote", out);
