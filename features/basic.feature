Feature: Sample Tests
In order to test the API
I need to be able to test the API

Scenario: Get Category
Given I have the payload:
"""
"""
When I request "GET /api/categories"
Then the response is JSON
