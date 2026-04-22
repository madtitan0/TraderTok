#!/usr/bin/env python3
"""
Merge assets/data/education_articles.json into locales/en.json and locales/es-419.json
under educationArticles for any article slug missing there.

Spanish card copy comes from tools/education_articles_es_overrides.json (id -> title, excerpt).
Optional keys seo_title, meta_description in overrides are respected when present.
"""
from __future__ import annotations

import json
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
ARTICLES_PATH = ROOT / "assets" / "data" / "education_articles.json"
ES_OVERRIDE_PARTS = [
    ROOT / "tools" / "education_articles_es_overrides_1.json",
    ROOT / "tools" / "education_articles_es_overrides_2.json",
]
DISCLAIMER = (
    "The information provided in this article is for educational purposes only and "
    "does not constitute financial advice or investment recommendations."
)


def load_json(path: Path) -> dict:
    with path.open(encoding="utf-8") as f:
        return json.load(f)


def save_json(path: Path, data: dict) -> None:
    with path.open("w", encoding="utf-8") as f:
        json.dump(data, f, ensure_ascii=False, indent=2)
        f.write("\n")


def build_entry(article: dict, es_overrides: dict, use_spanish: bool) -> dict:
    aid = article["id"]
    o = es_overrides.get(aid, {}) if use_spanish else {}
    title = (o.get("title") or article.get("title") or "").strip()
    excerpt = (o.get("excerpt") or article.get("excerpt") or "").strip()
    seo_title = (o.get("seo_title") or article.get("seo_title") or title).strip()
    meta_description = (o.get("meta_description") or article.get("meta_description") or excerpt).strip()
    category = article.get("category") or "Beginner"
    return {
        "title": title,
        "excerpt": excerpt,
        "seo_title": seo_title,
        "meta_description": meta_description,
        "category": category,
        "content": {"disclaimer": DISCLAIMER},
    }


def main() -> None:
    articles: list[dict] = load_json(ARTICLES_PATH)
    es_overrides: dict = {}
    for part in ES_OVERRIDE_PARTS:
        if part.is_file():
            es_overrides.update(load_json(part))

    for locale_name, use_spanish in (("en.json", False), ("es-419.json", True)):
        path = ROOT / "locales" / locale_name
        data = load_json(path)
        ea = data.setdefault("educationArticles", {})
        for article in articles:
            aid = article.get("id")
            if not aid or aid == "general":
                continue
            if aid in ea:
                continue
            ea[aid] = build_entry(article, es_overrides, use_spanish)
        save_json(path, data)

    print("Synced educationArticles from", ARTICLES_PATH)


if __name__ == "__main__":
    main()
