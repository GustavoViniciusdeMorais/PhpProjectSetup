---
name: general-coding-best-practices
description: 'General coding best practices inspired by "A Philosophy of Software Design" (John Ousterhout). Use when: designing function structure, deciding whether to extract a function, organizing pipeline/orchestrator functions, or placing error handling and logging.'
---

# General Coding Best Practices

## AI Behaviour
1. Present me the questions about code change with the `vscode_askQuestions` tool.

## Topics
- If a query is small and simple, such as fetching only the user id, first name, and email, keep it inline in the main function; don't encapsulate it in a separate function.
- The main function must call other functions, acting as a pipeline orchestrator.
- Use try-catch to handle errors only in the main function. Always add a log entry in the catch block by default.
- Write comments only to explain what is not obvious from reading the code itself (the "why", not the "what"). Don't restate what the code already shows.
