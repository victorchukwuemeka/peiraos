# PeiraOS — Build Actions

A living tracker of everything built, in progress, and coming next.
Update this as you ship each feature.

---

## Status Key

| Symbol | Meaning |
|---|---|
| ✅ | Done |
| 🔄 | In Progress |
| ⏳ | Up Next |
| ❌ | Not Started |

---

## Phase 1 — Core Engine

| # | Action | Status | Notes |
|---|---|---|---|
| 1 | Laravel project setup | ✅ | Laravel 12, PHP 8.2 |
| 2 | Groq API integration | ✅ | Llama 3.3 70B, free tier |
| 3 | Scripts database migration | ✅ | MySQL |
| 4 | ScriptGeneratorService | ✅ | Nigerian-context prompt |
| 5 | ScriptController | ✅ | Generate, index, export |
| 6 | API routes | ✅ | POST /api/scripts/generate |
| 7 | Blade + Tailwind frontend | ✅ | Basic dashboard |
| 8 | Script generation tested | ✅ | Returns 5 scripts per request |

---

## Phase 2 — User Accounts

| # | Action | Status | Notes |
|---|---|---|---|
| 9 | Install Laravel Breeze | ❌ | Auth scaffolding |
| 10 | Link scripts to users | ❌ | user_id on scripts table |
| 11 | Script history page | ❌ | Per logged-in user |
| 12 | Copy to clipboard button | ❌ | On each script card |
| 13 | WhatsApp share button | ❌ | wa.me deep link |

---

## Phase 3 — Upsell Engine

| # | Action | Status | Notes |
|---|---|---|---|
| 14 | Website audit tool | ❌ | Checks if business has a website |
| 15 | Lead capture form | ❌ | Feeds into Peira-Services pipeline |
| 16 | Audit results page | ❌ | Shows what the business is missing |
| 17 | "Get a website" CTA | ❌ | Links to Peira-Services WhatsApp |

---

## Phase 4 — Analytics

| # | Action | Status | Notes |
|---|---|---|---|
| 18 | Script view counter | ❌ | Track how many times a script is viewed |
| 19 | Most popular business types | ❌ | Simple aggregation query |
| 20 | Most popular locations | ❌ | Simple aggregation query |
| 21 | Admin dashboard | ❌ | Overview of all usage |

---

## Phase 5 — Content Tools

| # | Action | Status | Notes |
|---|---|---|---|
| 22 | CapCut template guide | ❌ | PDF guide linked to each script |
| 23 | Overlay text formatter | ❌ | Formats overlay_texts for CapCut |
| 24 | Export as formatted PDF | ❌ | Ready to hand to video editor |

---

## Phase 6 — SaaS & Monetisation

| # | Action | Status | Notes |
|---|---|---|---|
| 25 | Paystack integration | ❌ | Nigerian payments |
| 26 | Free plan (5 scripts/month) | ❌ | Limit by usage count |
| 27 | Starter plan ₦5,000/month | ❌ | 30 scripts, history, export |
| 28 | Pro plan ₦15,000/month | ❌ | Unlimited + analytics |
| 29 | Post scheduler (Instagram) | ❌ | Meta Graph API — paid |
| 30 | Post scheduler (TikTok) | ❌ | Requires TikTok business approval |

---

## Dev Log

| Date | What Was Done |
|---|---|
| 2026-04-10 | Project created, Groq integrated, API working, Blade frontend up |

---

*Update this file every time you ship something.*