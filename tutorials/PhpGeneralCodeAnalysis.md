---
name: php-general-code-analysis
description: 'Use when: doing a code analysis, solution search, "analyze", "analysis", "review codebase", "find a solution" request. Directs the agent to limit the number of files read by first listing candidate files and confirming them with the user via the ask-questions tool before reading, then answer short by default.'
---

# Analysis

## When to Use
- User asks to analyze, review, or audit code, a class, a module, or a flow
- User asks to search/find a solution or approach for a problem
- Any request where the scope of files to read is not explicit

## Main Directive

Never read files freely during an analysis request. Always confirm scope first.

## Procedure

1. Use targeted search tools (`grep_search`, `file_search`, `semantic_search`) to locate candidate files. Do not open/read file contents yet.
2. Build a short checklist of candidate files, each with a one-line reason why it's relevant.
3. Present the checklist to the user with the `vscode_askQuestions` tool, letting them remove, add, or confirm files.
4. Read only the confirmed files.
5. Proceed with the analysis using only that confirmed file set.

### Example `vscode_askQuestions` call

```json
{
  "questions": [
    {
      "header": "Files to Read",
      "question": "Which files should I read for this analysis?",
      "message": "Found these candidates. Select the ones to read, or add others in free text.",
      "multiSelect": true,
      "allowFreeformInput": true,
      "options": [
        { "label": "app/Http/Controllers/UsersController.php", "description": "Main entry point for the request" },
        { "label": "app/Models/User.php", "description": "Model referenced by the controller" },
        { "label": "app/Actions/UpdateUserAction.php", "description": "Business logic invoked by the controller" }
      ]
    }
  ]
}
```

## Output Format

Default answer must be short. Only expand when the user asks for more detail.

### Code Analysis
```
**Summary:** <1-2 lines, what the code does>
**Finding(s):** <up to 3 bullets>
**Files:** <files read>
```

### Solution Search
```
**Best option:** <name/approach>
**Why:** <1 line>
**Alternatives:** <up to 2, 1 line each>
```

## References

Every answer must close with a `References` line citing where the conclusion came from (official docs, RFCs, PSR specs, books). Max 2 links.

```
**References:** <name> — <link>
```

End every short answer with: "Ask for more detail if needed."
