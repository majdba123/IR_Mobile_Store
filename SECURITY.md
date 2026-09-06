# Security Policy

## Reporting a vulnerability

Please report suspected vulnerabilities privately to **majdbayer77@gmail.com**.

Do not publish credentials, API tokens, private keys, personal data, exploit details, or production environment information in a public issue before remediation.

Useful reports include the affected endpoint/component, reproducible steps, impact, authentication context, and sanitized evidence.

## Priority areas

High-priority reports include authentication/authorization bypass, order or account data exposure, injection, unsafe imports/uploads, scraping/data-ingestion abuse, payment-record handling issues, secret leakage, and vulnerabilities in search/retrieval or administration APIs.

## Secrets and integrations

Runtime credentials must remain in environment configuration or provider-managed secret stores. External service credentials must not be committed.

If any credential has ever entered Git history, rotate/revoke it at the provider even after removing it from the current branch.

## Supported code

Security remediation targets the current default branch and maintained application/data-collection paths. Historical revisions are not supported production baselines.
