#### Labeled Colors
| Label        | Role                          | Tailwind       | Hex      | Notes                                                                 |
|--------------|-------------------------------|----------------|----------|-----------------------------------------------------------------------|
| bg-primary  | Main Background              | `bg-zinc-950` | #030712 | Deep, cozy canvas—default for sections/pages.                         |
| text-body   | Body Text                    | `text-gray-400` | #9ca3af | Moody readability (~7:1 contrast on bg-primary).                      |
| text-secondary | Subtle Text (e.g., labels, captions) | `text-gray-600` | #4b5563 | Deeper gray for hierarchy (~4:1, low-contrast style).                 |
| text-heading | Headings (H1/H2)             | `text-gray-200` | #e4e4e7 | Balanced pop (~12:1); fallback from earlier chats.                    |
| accent-blue | Dashes/Pops (e.g., icons, links) | `text-sky-500` | #0ea5e9 | Single striking use—keeps it fresh.                                   |
| border-subtle | Dividers/Shadows            | `border-gray-700` | #374151 | For cards/sections; blue-tinted depth.                                |

#### Typography Scale
| Element              | Font     | Size  | Line-Height     | Weight | Example Use              | Tailwind Classes                                      |
|----------------------|----------|-------|-----------------|--------|--------------------------|-------------------------------------------------------|
| Big Heading (H1)    | Playfair | 48px | 56px (1.17x)   | 800    | Section hero/title      | `text-4xl md:text-5xl font-serif font-black leading-tight` |
| Moderate Subheading (H2) | Playfair | 32px | 40px (1.25x)   | 700    | Subsection breaks       | `text-3xl md:text-4xl font-serif font-bold leading-snug` |
| Body Text           | Inter    | 16px | 24px (1.5x)    | 400    | Paragraphs/descriptions | `text-base leading-relaxed`                           |
| Secondary Text      | Inter    | 14px | 20px (1.43x)   | 500    | Captions/labels         | `text-sm leading-normal`                              |

Which table to tweak next, or ready for icons?