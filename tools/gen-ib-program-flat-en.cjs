"use strict";
const fs = require("fs");
const path = require("path");

const flat = {
  "hero.badge": "Partner Program",
  "hero.title": "TRADERTOK PARTNER PROGRAM",
  "hero.p1":
    "The TraderTok Partner Program is structured to support long-term, performance-driven partnerships across global markets through flexible commercial models, operational support, and scalable growth systems.",
  "hero.p2":
    "This page presents the updated global program structure in a static format so the positioning, partner value, and operating model are clearly defined before deeper functionality is added.",

  "overview.title": "Overview",
  "overview.p1":
    "The TraderTok Partner Program is designed to build long-term, performance-driven partnerships across global markets. It focuses on sustainable partner growth, scalable client acquisition, consistent revenue generation, and strong operational and marketing support.",
  "overview.p2":
    "The structure is intentionally flexible and can be tailored based on partner profile, region, and business model.",

  "positioning.title": "Program Positioning",
  "positioning.body":
    "TraderTok Partner Program is positioned as a structured partnership model focused on stability, growth, and long-term value, supported by performance incentives, advanced tools, and regional strategies.",

  "benefits.title": "Partner Benefits",
  "benefits.listHtml":
    "<li>Competitive earning opportunities aligned with performance</li><li>Flexible partnership models based on business needs</li><li>Ongoing support for acquisition and retention</li><li>AI-powered tools to improve conversion and efficiency</li><li>Full tracking and reporting visibility through a structured partner system</li>",

  "earning.title": "Earning Structure",
  "earning.revenueTitle": "Revenue Opportunities",
  "earning.revenueListHtml":
    "<li>Revenue share based on client trading activity, up to around $15 to $20 per lot depending on structure and instrument</li><li>Performance-based incentives linked to client acquisition and engagement</li><li>CPA-based rewards in selected regions</li><li>Scalable earning potential as partner activity grows</li>",
  "earning.commercialTitle": "Customized Commercial Logic",
  "earning.commercialListHtml":
    "<li>Partner experience and network</li><li>Client volume and activity</li><li>Geographic market</li><li>Business model, including affiliate, IB, influencer, or similar structures</li>",
  "earning.tieredTitle": "Tiered Growth Structure",
  "earning.tieredListHtml":
    "<li>Higher trading volume</li><li>Consistent client activity</li><li>Long-term performance</li><li>Enhanced earning structures, additional incentives, and priority support as performance increases</li>",

  "conversion.title": "Conversion & AI Support",
  "conversion.listHtml":
    "<li>AI-powered WhatsApp chatbot for lead qualification</li><li>Automated response systems</li><li>Funnel tracking from lead to deposit to activation</li>",
  "conversion.p1":
    "These tools are designed to improve response speed, increase conversion rates, and support scalable partner operations.",

  "portal.title": "Partner System & Portal",
  "portal.listHtml":
    "<li>Real-time referral tracking and attribution</li><li>Transparent commission reporting and payout visibility</li><li>Self-service performance dashboards</li><li>Campaign tracking and optimization tools</li>",
  "portal.p1":
    "This reduces operational dependency, improves transparency and trust, and enables partners to scale more efficiently.",

  "who.title": "Who Should Partner With Us",
  "who.listHtml":
    "<li>Master IB and Retail IB</li><li>Fund managers</li><li>EA or auto-trade developers</li><li>Investment advisors</li><li>Signal providers</li><li>Investment educators</li>",

  "payments.title": "Payments & Operations",
  "payments.listHtml":
    "<li>Flexible payout structures based on partner agreements</li><li>Daily or periodic payout options</li><li>Operational processes optimized for speed and reliability</li>",

  "compliance.title": "Compliance & Partnership Principle",
  "compliance.listHtml":
    "<li>No misleading claims or guarantees</li><li>Clear and transparent communication</li><li>Controlled and compliant promotional structures</li><li>Alignment with regulatory requirements across markets</li><li>Flexibility in structure and agreements</li><li>Performance-based growth</li><li>Long-term collaboration built on mutual agreement</li>",

  "meta.pageTitle": "Partner Program (IB) | TraderTok",
  "meta.pageDescription":
    "TraderTok Partner Program: structured partnerships, earning models, AI and portal support, and compliance principles for introducing brokers and partners.",
};

const out = path.join(__dirname, "ib-program-flat", "en.json");
fs.mkdirSync(path.dirname(out), { recursive: true });
fs.writeFileSync(out, JSON.stringify(flat, null, 2) + "\n", "utf8");
console.log("wrote", out);
