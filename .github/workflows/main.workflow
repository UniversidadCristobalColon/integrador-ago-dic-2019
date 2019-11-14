workflow "PHP Linting" {
  resolves = ["Execute"]
  on = "pull_request"
  on = "push"
}

action "Execute" {
  uses = "michaelw90/PHP-Lint@master"
}
